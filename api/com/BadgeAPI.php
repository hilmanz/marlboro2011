<?php 
define('BANNED_TIME',1);
include_once "BadgeModel.php";
class BadgeAPI{
	var $model;
	var $time_banned = 0; //10 minutes banned time
	var $retry = 0;
	var $next_allowed_time = 0;
	var $SCHEMA_CODE;
	function __construct(){
		global $SCHEMA_CODE;
		$this->SCHEMA_CODE = $SCHEMA_CODE;
		if($this->next_allowed_time==0){
			$this->next_allowed_time = $_SESSION[sha1('next_allowed_time')];		
		}
		$this->time_banned = (60*BANNED_TIME);
		$this->model = new BadgeModel();
	}
	function run(){
		$methodName = mysql_escape_string($_REQUEST['method']);
		print $this->execute($methodName);
	}
	function execute($methodName){
		if(method_exists($this, $methodName)){
			return $this->$methodName();
		}else{
			return "gak ada methodnya";
		}
	}
	function check(){
		
		$_SESSION[sha1('retry')] = intval($_SESSION[sha1('retry')]);
		
		if($_SESSION[sha1('retry')]==3||$_SESSION[sha1('next_allowed_time')]>time()){
			if($_SESSION[sha1('next_allowed_time')]==0){
				$_SESSION[sha1('next_allowed_time')]=time()+(60*BANNED_TIME);
				
			}else{
				
				if($_SESSION[sha1('next_allowed_time')]<=time()){
					$_SESSION[sha1('next_allowed_time')]=0;
					$_SESSION[sha1('retry')] = 0;
				}
			}
			//print $_SESSION[sha1('next_allowed_time')]." vs ".time()."<br/>";
			//print "banned for ".BANNED_TIME." minutes";
			return $this->outputMessage(401,'Anda sudah memasukkan kode yang salah sebanyak 3x. Silahkan tunggu '.BANNED_TIME.' menit untuk memasukkan kode yang baru',$data);
		}
		$kode = $_REQUEST['kode'];
		
		$kode = strtolower($kode);
		if(eregi("([0-9a-z]+)",$kode)&&strlen($kode)==8){
			$conn = open_db(0);
			$q = mysql_query("SELECT kode FROM ".$this->SCHEMA_CODE.".badge_code WHERE kode='".mysql_escape_string($kode)."' LIMIT 1",$conn);
			$f = mysql_fetch_assoc($q);			
			mysql_free_result($q);
			mysql_close($conn);
			if($f['kode']==$kode){
				return $this->outputMessage(1,'Kode Cocok',$f);
			}else{
				$_SESSION[sha1('retry')]++;
				
				return $this->outputMessage(400,'Kode yang dimasukkan salah.',$data);
			}
		}else{
			$_SESSION[sha1('retry')]++;
			return $this->outputMessage(400,'Kode yang dimasukkan salah.',$data);
		}
	}
	function outputMessage($statusCode,$message,$data){
		$arr = array("status"=>$statusCode,"message"=>$message,"data"=>$data);
		return json_encode($arr);
	}
	function redeem_code(){
		//$user_id = intval($user_id);
		$user_id = $_REQUEST['user_id'];
		$kode = $_REQUEST['kode'];
		$kode = strtolower($kode);
		if(eregi("([0-9]+)",$user_id)&&eregi("([0-9a-z]+)",$kode)&&strlen($kode)==8){
			$data = $this->code_valid($user_id,$kode);
			if($data!=null){
				if($data['owned']=="1"){
					return $this->outputMessage(2,'Badge is already redeemed',array($user_id,$kode));
				}else if($data['expired']=="1"){
					return $this->outputMessage(3,'Badge is expired',array($user_id,$kode));
				}else{
					return $this->getBadge($user_id,$kode,$data['tier']);
				}
			}else{
				return $this->outputMessage(0,'Badge Invalid',array($user_id,$kode));
			}
		}else{
			return $this->outputMessage(0,'Kode Invalid',array($user_id,$kode));
		}
	}
	function code_valid($user_id,$kode){
		$conn = open_db(0);
		//check if it's exist
		$sql = "SELECT COUNT(id) as total FROM ".$this->SCHEMA_CODE.".badge_redeem WHERE kode='".$kode."' LIMIT 1";
		$q = mysql_query($sql,$conn);
		
		$f = mysql_fetch_assoc($q);
		
		if($f['total']>0){
			$code_used = true;
		}else{
			$code_used = false;
		}
		if($f!=NULL){
			//check if it's owned by the user
			//check if it's exist
			$sql = "SELECT user_id FROM ".$this->SCHEMA_CODE.".badge_redeem WHERE kode='".$kode."' AND user_id=".$user_id." LIMIT 1";
			$q = mysql_query($sql,$conn);
			$f = mysql_fetch_assoc($q);
			if($f['user_id']==$user_id){
				$code_owned = true;
			}else{
				$code_owned = false;
			}
			//detail tentang kode
			$sql = "SELECT * FROM ".$this->SCHEMA_CODE.".badge_code WHERE kode='".$kode."' 
					AND start_date <= '".date("Y-m-d")."' AND end_date >= '".date("Y-m-d")."'
					LIMIT 1";
			
			$q = mysql_query($sql,$conn);
			$kode_info = mysql_fetch_assoc($q);
			
			if($kode_info==null){
				//cek apakah kodenya valid tapi sudah expired ?
				$sql = "SELECT * FROM ".$this->SCHEMA_CODE.".badge_code WHERE kode='".$kode."' 
					AND start_date <= '".date("Y-m-d")."'
					LIMIT 1";
				$q = mysql_query($sql,$conn);
				$kode_info = mysql_fetch_assoc($q);
				if($kode_info){
					$kode_info['expired'] = 1;
				}
			}
			
			mysql_free_result($q);
			mysql_close($conn);
			if($kode_info){
				if($code_used&&!$code_owned&&$kode_info['type']==1){
					//print "1";
					
					return $kode_info;
				}else if($code_used&&$code_owned){
					//print "2";
					$kode_info['owned']=1;
					return $kode_info;
					//return $kode_info;
				}else if(!$code_used){
					//print "3";
					
					return $kode_info;
				}else{
					
					//code is used
					return null;
				}
			}
		}
		return null;
	}
	function get_badge_detail(){
		$badge_id = $_REQUEST['badge_id'];
		
		$sql = "SELECT id as badge_id,name,image as img,description FROM ".$this->SCHEMA_CODE.".badge_catalog WHERE id=".intval($badge_id)." LIMIT 1";
		
		$conn = open_db(0);
		$rs = fetch($sql,$conn);
		mysql_close($conn);
		if($rs['badge_id']!=null){
			return $this->outputMessage(1,'Success',$rs);
		}else{
			return $this->outputMessage(-1,'Badge not found',array("badge_id"=>$badge_id));
		}
	}
	function getBadge($user_id,$kode,$tier){
		
		$sql = "SELECT a.id,a.name,a.prob_rate,a.tier,a.series_type 
				FROM ".$this->SCHEMA_CODE.".badge_catalog a WHERE tier=".intval($tier);
		$conn = open_db(0);
		$rs = fetch_many($sql,$conn);
		mysql_close($conn);
		if(sizeof($rs)){
			foreach($rs as $n=>$v){
				$rs[$n]['weight'] = $v['prob_rate']*rand(1,12);
			}
			$rs = array_sort($rs,'weight');
			$badge = $rs[0];
			
			//insert the badge into user inventory
			if($this->purchase_badge($user_id,$kode,$badge)){
				return $this->outputMessage(1,'Badge purchased successfully !',array("user_id"=>$user_id,"kode"=>$kode,"badge"=>$badge));
			}else{
				return $this->outputMessage(0,'Badge cannot be purchased.',array("user_id"=>$user_id,"kode"=>$kode,"badge"=>$badge));
			}
		}else{
			return $this->outputMessage(-1,'Badge not found',array("user_id"=>$user_id,"kode"=>$kode,"badge"=>$badge));
		}
	}
	function purchase_badge($user_id,$kode,$badge){
		$conn = open_db(0);
		$sql = "INSERT INTO ".$this->SCHEMA_CODE.".`badge_redeem`
            (`user_id`,
             `redeem_time`,
             `kode`)
			VALUES (".$user_id.",
			        NOW(),
			        '".$kode."')";
		$q = mysql_query($sql,$conn);
		//print mysql_error();
		$insert_id = mysql_insert_id();
		
		//print mysql_error();
		if($insert_id >0){
			$sql = "INSERT INTO ".$this->SCHEMA_CODE.".`badge_inventory`
            (`user_id`,
             `redeem_time`,
             `badge_id`,redeem_id)
			VALUES (".$user_id.",
			        NOW(),
			        ".intval($badge['id']).",".intval($insert_id).")";
				$q = mysql_query($sql,$conn);
				//print mysql_error();
				$n_badge = mysql_insert_id();
		}
		mysql_close($conn);
		if($n_badge>0){
			return true;
		}
	}
	function generate_code(){
		//ini_set("memory_limit","32M");
		$conn = open_db(0);
		$mask_table1 = array('k','a','9','4','G','I','2','6','z');
		$mask_table2 = array('r','4','h','1','0','y','z','7','w');
		$mask_table3 = array('5','z','1','3','s','d','8','6','x');
		$mask_table4 = array('0','1','2','3','4','5','6','7','8','9',
								'a','b','c','d','e','f','g','h','i','j',
								'k','l','m','n','o','p','q','r','s','t',
								'u','v');
		$amount = intval($_REQUEST['amount']);
		$tier = intval($_REQUEST['tier']);
		$type = intval($_REQUEST['type']);
		$channel = intval($_REQUEST['channel']);
		$is_wildcard = intval($_REQUEST['wildcard']);
		$start_date = $_REQUEST['startDate'];
		$end_date = $_REQUEST['expireDate'];
		$location = $_REQUEST['city'];
		$description = $_REQUEST['event'];
		//cap amountnya		
		if($amount>10000){
			$amount=10000;
		}		
		$kode_left = $amount;
		$new_code = array();
		while($kode_left>0){
			$sql="INSERT IGNORE INTO 
				".$this->SCHEMA_CODE.".badge_code(
				kode,
				channel,
				tier,
				is_wildcard,
				is_used,
				type,
				generated_date,
				n_status,start_date,end_date,location,description)
				VALUES";
			
			$t=0;
		
			while($kode_left>0){
				//$rr = rand(0,2);
				//if($rr==1){
				//	$kode = $mask_table1[$tier].$mask_table1[$channel];
				//}elseif($rr==2){
				//	$kode = $mask_table2[$tier].$mask_table2[$channel];
				//}else{
				//	$kode = $mask_table3[$tier].$mask_table3[$channel];
				//}
				$n=0;
				$kode="";
				while($n<8){
					$kode.=$mask_table4[rand(0,sizeof($mask_table4)-1)];
					$n++;
				}
				if($t>0){
					$sql.=",";
				}
				$t=1;
				$sql.="('".$kode."',".$channel.",".$tier.",".$is_wildcard.",0,".$type.",NOW(),1,
						'".$start_date."','".$end_date."','".$location."','".$description."')";
				$kode_left--;
				array_push($new_code,strtoupper($kode));
				//$new_code[] = strtoupper($kode);
			}
			//print $sql;
			$q = mysql_query($sql,$conn);
			
			//print mysql_affected_rows()." code generated<br/>---<br/>";
			if(mysql_affected_rows()>0){
				$kode_left=$amount-mysql_affected_rows();
			}else{
				$kode_left = 0;
			}
		}
		mysql_close($conn);
		return $this->outputMessage(1,'Code Generation done',$new_code);
		//return $sql;
		//return "generate code nih !";
	}
	function get_inventory(){
		$user_id = $_REQUEST['user_id'];
		if(eregi("([0-9]+)",$user_id)){
			$conn = open_db(0);
			$sql = "SELECT a.badge_id,COUNT(a.badge_id) as total,b.name as description,
					b.series_type as categoryID,b.image as img,c.name as categoryName
					FROM ".$this->SCHEMA_CODE.".badge_inventory a INNER JOIN
					".$this->SCHEMA_CODE.".badge_catalog b ON 
					a.badge_id = b.id
					INNER JOIN 
					".$this->SCHEMA_CODE.".badge_series c
					ON b.series_type = c.id
					WHERE a.user_id=".intval($user_id)." GROUP BY badge_id 
					LIMIT 100";
			
			$rs = fetch_many($sql, $conn);
			mysql_close($conn);
			return $this->outputMessage(1,'SUCCESS',$rs);
		}else{
			return $this->outputMessage(0,'FAILED',NULL);
		}
	}
	/**
	 * 
	 * Searching the badge list owned by a user id
	 */
	function search(){
		$tier = intval($_REQUEST['tier']);
		$type = intval($_REQUEST['type']);
		$user_id = $_REQUEST['user_id'];
		if(eregi("([0-9]+)",$user_id)){
			if($type!=0&&$tier!=0){
				$sql = "SELECT a.id AS inventory_id,a.badge_id,b.name,b.tier,b.series_type 
					FROM ".$this->SCHEMA_CODE.".badge_inventory a
					INNER JOIN ".$this->SCHEMA_CODE.".badge_catalog b
					ON a.badge_id = b.id
					WHERE a.user_id=".$user_id." AND b.series_type=".$type." AND b.tier=".$tier." LIMIT 100";
			}else if($type!=0){
				$sql = "SELECT a.id AS inventory_id,a.badge_id,b.name,b.tier,b.series_type 
					FROM ".$this->SCHEMA_CODE.".badge_inventory a
					INNER JOIN ".$this->SCHEMA_CODE.".badge_catalog b
					ON a.badge_id = b.id
					WHERE a.user_id=".$user_id." AND b.series_type=".$type." LIMIT 100";
			}else{
				$sql = "SELECT a.id AS inventory_id,a.badge_id,b.name,b.tier,b.series_type 
					FROM ".$this->SCHEMA_CODE.".badge_inventory a
					INNER JOIN ".$this->SCHEMA_CODE.".badge_catalog b
					ON a.badge_id = b.id
					WHERE a.user_id=".$user_id." LIMIT 100";
			}
			$conn = open_db(0);
			$rs = fetch_many($sql, $conn);
			mysql_close($conn);
			if(sizeof($rs)>0){
				return $this->outputMessage(1,'SUCCESS',$rs);
			}else{
				return $this->outputMessage(0,'NOT FOUND',NULL);
			}
		}else{
			return $this->outputMessage(-1,'Invalid User ID',NULL);
		}
	}
	function search_badge_owners(){
		$badge_id = $_REQUEST['badge_id'];
		$exclude_user_id = $_REQUEST['exclude_user_id'];
		if(eregi("([0-9]+)",$badge_id)&&eregi("([0-9]+)",$exclude_user_id)){
			$sql = "SELECT user_id,badge_id,COUNT(badge_id) as total 
					FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$badge_id." AND user_id <> ".$exclude_user_id." GROUP BY user_id
					LIMIT 100";
			$conn = open_db(0);
			$rs = fetch_many($sql,$conn);
			mysql_close($conn);
			if(sizeof($rs)>0){
				return $this->outputMessage(1,'SUCCESS',$rs);
			}else{
				return $this->outputMessage(0,'NOT FOUND',NULL);
			}
		}else{
			return $this->outputMessage(-1,'Invalid Badge Code',NULL);
		}
	}
	
	function auction_post(){
		$need_id = $_REQUEST['need_id'];
		$with_id = $_REQUEST['with_id'];
		$user_id = $_REQUEST['user_id'];
		if(eregi("([0-9]+)",$need_id)&&eregi("([0-9]+)",$with_id)&&eregi("([0-9]+)",$user_id)){
			$conn = open_db(0);
			//check dulu.. inventory dia cukup gak..
			$sql = "SELECT user_id,badge_id,COUNT(badge_id) as total 
					FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$with_id." 
					AND user_id = '".$user_id."' GROUP BY user_id
					LIMIT 1";
			
			$rs = fetch($sql,$conn);
			
			$total_owned_badge = $rs['total'];
			
			//check yang ada di auction ada berapa..
			$sql = "SELECT user_id,with_id,COUNT(with_id) as total 
					FROM ".$this->SCHEMA_CODE.".auction_post WHERE with_id=".$with_id." 
					AND user_id = '".$user_id."' GROUP BY user_id
					LIMIT 1";
			
			$rs = fetch($sql,$conn);
			
			$total_auctioned = $rs['total'];
			
			if(($total_owned_badge - $total_auctioned) > 0){
				$sql = "INSERT INTO ".$this->SCHEMA_CODE.".auction_post(user_id,need_id,with_id,posted_date,closed_time,n_status)
					VALUES('".$user_id."','".$need_id."','".$with_id."',NOW(),NULL,0)";
			
				$rs = mysql_query($sql,$conn);
				mysql_close($conn);
				if($rs){
					return $this->outputMessage(1,'SUCCESS',null);
				}else{
					return $this->outputMessage(0,'Failed',NULL);
				}
			}else{
				mysql_close($conn);
				return $this->outputMessage(0,"You don't have enough badge",NULL);
			}
			
		}else{
			return $this->outputMessage(-1,'Wrong given parameters',NULL);
		}
	}
	function search_auction(){
		$need_id = $_REQUEST['need_id'];
		$with_id = $_REQUEST['with_id'];
		$exclude_user_id = $_REQUEST['exclude_user_id'];
		if(eregi("([0-9]+)",$need_id)&&eregi("([0-9]+)",$with_id)&&eregi("([0-9]+)",$exclude_user_id)){
			$conn = open_db(0);
			//cari auction
			$sql = "SELECT id as auction_id,user_id,need_id,with_id
					FROM ".$this->SCHEMA_CODE.".auction_post 
					WHERE with_id=".$need_id." AND need_id=".$with_id." 
					AND user_id <> '".$exclude_user_id."' AND n_status=0
					LIMIT 100";
			
			$rs = fetch_many($sql,$conn);
			mysql_close($conn);
			
			if(sizeof($rs)>0){
				return $this->outputMessage(1,'SUCCESS',$rs);
			}else{
				return $this->outputMessage(0,'Not found',$rs);
			}			
		}else{
			return $this->outputMessage(-1,'Wrong given parameters',NULL);
		}
	}
	function badge_redeemed(){
		$prize = mysql_escape_string($_REQUEST['prize']);
		$badges = $_REQUEST['badges'];
		$user_id = $_REQUEST['user_id'];
		//$badges = explode(",",$badges);
		if(strlen($badges)>0){
			$conn = open_db(0);
			$sql = "SELECT id,badge_id,user_id,redeem_id,redeem_time FROM ".$this->SCHEMA_CODE.".badge_inventory 
			WHERE user_id=".$user_id." AND 
			badge_id IN (".$badges.") GROUP by badge_id";
			
			$badges = fetch_many($sql,$conn);
			if(sizeof($badges)>0){
				$sql = "INSERT INTO ".$this->SCHEMA_CODE.".merchandise_transaction(user_id,request_date,prize,n_status)
								VALUES('".$user_id."',NOW(),'".mysql_escape_string($prize)."',0)";
				$q = mysql_query($sql,$conn);
				$transaction_id = mysql_insert_id($conn);
			}else{
				$issuficient_badge = true;
			}
			$is_ok = false;
			if($transaction_id>0){
				foreach($badges as $badge){
					if($badge['id']!=null){
						$sql = "DELETE FROM ".$this->SCHEMA_CODE.".badge_inventory 
						WHERE id=".$badge['id']." AND user_id=".$user_id."";
						mysql_query($sql,$conn);
						$sql = "INSERT INTO ".$this->SCHEMA_CODE.".merchandise_redeem(user_id,redeemed_date,badge_id,prize,transaction_id,redeem_id,redeem_time)
								VALUES(".$user_id.",NOW(),".$badge['badge_id'].",'".$prize."',".$transaction_id.",".$badge['redeem_id'].",'".$badge['redeem_time']."')";
					
						mysql_query($sql,$conn);
					}
				}
				$is_ok =true;
			}
			mysql_close($conn);
			if($is_ok){
				return $this->outputMessage(1, "the badge successfully redeemed with a merchandise", array("badges"=>$badges,"transaction_id"=>$transaction_id));
			}else{
				if($issuficient_badge){
					return $this->outputMessage(3, "Not enough Badges", $badges);
				}else{
					return $this->outputMessage(2, "cannot save the transaction", $badges);
				}
			}
		}else{
			return $this->outputMessage(0, "badge-merchandise redeemed is failed", $badges);
		}
		
	}
	function cancel_redeem(){
		$user_id = mysql_escape_string($_REQUEST['user_id']);
		$transaction_id = mysql_escape_string($_REQUEST['transaction_id']);
		$conn = open_db(0);
		//get all badges
		$sql="SELECT * FROM ".$this->SCHEMA_CODE.".merchandise_redeem WHERE transaction_id=".$transaction_id."";
		$badges = fetch_many($sql, $conn);
		$sql = "INSERT INTO ".$this->SCHEMA_CODE.".badge_inventory(user_id,redeem_time,badge_id,redeem_id) VALUES ";
		$n=0;
		foreach($badges as $badge){
			if($n>0){
				$sql.=",";
			}
			$sql.="('".$user_id."','".$badge['redeem_time']."',".$badge['badge_id'].",".$badge['redeem_id'].")";
			$n=1;
		}
		$q = mysql_query($sql,$conn);
		
		if($q){
			$sql = "DELETE FROM ".$this->SCHEMA_CODE.".merchandise_redeem WHERE user_id='".$user_id."' AND transaction_id = '".$transaction_id."'";
			mysql_query($sql,$conn);
			$sql = "UPDATE ".$this->SCHEMA_CODE.".merchandise_transaction SET n_status=2 
					WHERE user_id='".$user_id."' AND id='".$transaction_id."'";
			mysql_query($sql,$conn);
			$is_ok = true;
		}
	
		mysql_close($conn);
		if($is_ok){
			return $this->outputMessage(1, "Badge successfully returned !", $badges);
		}else{
			return $this->outputMessage(0, "cannot return the badge, the badge might be already exist in inventory", $badges);
		}
	}
	function approve_redeem(){
		$user_id = mysql_escape_string($_REQUEST['user_id']);
		$transaction_id = mysql_escape_string($_REQUEST['transaction_id']);
		$conn = open_db(0);
		$sql="SELECT * FROM ".$this->SCHEMA_CODE.".merchandise_transaction 
			  WHERE id='".$transaction_id."'";
		
		$trans = fetch($sql, $conn);
		
		if($trans['id']==$transaction_id&&$trans['user_id']==$user_id){
			$sql = "UPDATE ".$this->SCHEMA_CODE.".merchandise_transaction SET n_status=1 
					WHERE user_id='".$user_id."' AND id='".$transaction_id."'";
			$q = mysql_query($sql,$conn);
		}
		mysql_close($conn);
		if($q){
			return $this->outputMessage(1, "Merchandise Approved !", array("transaction_id"=>$transaction_id,"user_id"=>$user_id));
		}else{
			return $this->outputMessage(0, "Error", array("transaction_id"=>$transaction_id,"user_id"=>$user_id));
		}
	}
	function trade(){
		$need_id = $_REQUEST['need_id'];
		$with_id = $_REQUEST['with_id'];
		$user_id = $_REQUEST['user_id'];//buyer
		$auction_id = $_REQUEST['auction_id'];
		
		if(eregi("([0-9]+)",$need_id)&&eregi("([0-9]+)",$with_id)&&eregi("([0-9]+)",$user_id)&&eregi("([0-9]+)",$auction_id)){
			$conn = open_db(0);
			//lihat detail tradenya, dan pastikan statusnya belum diambil orang
			$sql = "SELECT id as auction_id,user_id,with_id,need_id 
					FROM ".$this->SCHEMA_CODE.".auction_post 
					WHERE id=".$auction_id." AND n_status=0
					LIMIT 1";
			$rs = fetch($sql,$conn);
			
			//$rs --> seller
			if($rs['auction_id']!=NULL){
				//search auction id from the user
				$sql = "SELECT id as auction_id,user_id,with_id,need_id 
					FROM ".$this->SCHEMA_CODE.".auction_post 
					WHERE user_id=".$user_id." AND n_status=0
					AND need_id='".$need_id."' AND with_id='".$with_id."'
					LIMIT 1";
				
				$rs2 = fetch($sql,$conn); 
				//rs2 == buyer
				if($rs2['auction_id']>0){
					//proses tradenya
					//pastikan si buyer masih punya trade bersangkutan
					$sql = "SELECT user_id,badge_id,COUNT(badge_id) as total 
						FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$rs['need_id']." 
						AND user_id = '".$user_id."' GROUP BY user_id
						LIMIT 1";
				
					$buyer = fetch($sql,$conn);
					//pastikan si seler jg punya cukup badge
					$sql = "SELECT user_id,badge_id,COUNT(badge_id) as total 
						FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$rs['with_id']." 
						AND user_id = '".$rs['user_id']."' GROUP BY user_id
						LIMIT 1";
					$seller = fetch($sql,$conn);
					
					if($buyer['total']>0&&$seller['total']>0){
						//yes.. we can do trade
						$sql = "SELECT id,user_id,badge_id
						FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$rs['need_id']." 
						AND user_id = '".$user_id."'
						LIMIT 1";
						$buyer_item = fetch($sql,$conn);
						
						$sql = "SELECT id,user_id,badge_id
						FROM ".$this->SCHEMA_CODE.".badge_inventory WHERE badge_id=".$rs['with_id']." 
						AND user_id = '".$rs['user_id']."'
						LIMIT 1";
						$seller_item = fetch($sql,$conn);
						
						//var_dump($buyer_item);
						
						//var_dump($seller_item);
						
						$sql="UPDATE ".$this->SCHEMA_CODE.".badge_inventory SET user_id=".$rs['user_id']."
							  WHERE id=".$buyer_item['id'];
						mysql_query($sql,$conn);
						
						$sql="UPDATE ".$this->SCHEMA_CODE.".badge_inventory SET user_id=".$user_id."
							  WHERE id=".$seller_item['id'];
						mysql_query($sql,$conn);
						
						//log transaction
						$sql = "INSERT IGNORE INTO ".$this->SCHEMA_CODE.".transaction_history(auction_id1,auction_id2,transaction_date)
								VALUES('".$rs2['auction_id']."','".$rs['auction_id']."',NOW())";
						mysql_query($sql,$conn);
						
						//update auctions
						$sql="UPDATE ".$this->SCHEMA_CODE.".auction_post SET n_status=1
							  WHERE id=".$rs['auction_id'];
						mysql_query($sql,$conn);
						
						$sql="UPDATE ".$this->SCHEMA_CODE.".auction_post SET n_status=1
							  WHERE id=".$rs2['auction_id'];
						mysql_query($sql,$conn);
						
						$output = $this->outputMessage(1,"Trade success",array($rs,$rs2));
					}else{
						$output = $this->outputMessage(0,"Insufficient badge to trade",array($rs,$rs2));
					}									
					//
				}else{
					$output = $this->outputMessage(0,"Your trade is already closed",$rs);
				}
			}else{
				$output = $this->outputMessage(0,"The item is already taken by somebody else",$rs);
			}
			mysql_close($conn);
			return $output;
		}else{
			return $this->outputMessage(-1,'Wrong given parameters',NULL);
		}
	}
}
?>
