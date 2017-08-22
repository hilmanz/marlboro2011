<?php
global $APP_PATH;
global $ENGINES_PATH;
include_once $APP_PATH.'marlboro/helper/BadgeHelper.php';
include_once $ENGINES_PATH."Gummy.php";
include_once $ENGINES_PATH."functions.php";
include_once $APP_PATH.'Application.php';
class codeHelper extends Application{
	var $Request;
	var $View;
	var $_mainLayout="";
	var $_badgeRequireForPrize;
	var $_badgeHaveForPrize;
	var $_registerId='';
	var $badgeHelper;
	
	function __construct($register_id){
		$this->Request = $req;
		$this->View = new BasicView();
		$this->_registerId=$register_id;
		$this->badgeHelper = new BadgeHelper('badge_api');
	}
	
	//Chek Badge Request For Prize
	function checkBadgeRequestForPrize($prize){
		
		$req = $this->getBadgeRequestForPrize($prize);
		$res = json_decode($this->badgeHelper->get_user_badges($this->_registerId));
		
		$num = count($res->data);
		$badge=array();
		for($i=0;$i<$num;$i++){
			$badge[$i] = $res->data[$i]->badge_id;
		}
		
		//print_r($badge);exit;
		
		$data = array();
		$idx = 0;
		foreach($req as $k => $v){
			$data[$idx] = 0;
			foreach($badge as $i => $j){
				if( $v == $j ){
					$data[$idx] = $v;
				}
			}
			$idx++;
		}
		
		//print_r($req);exit;
		
		$this->_badgeHaveForPrize=$data;
		return $this->_badgeHaveForPrize;
	}
	
	//Get Badge Request For Prize
	function getBadgeRequestForPrize($prize){
		global $PRIZE;
		$this->_badgeRequireForPrize= $PRIZE[$prize];
		return $this->_badgeRequireForPrize;
	}
	
	function checkAllowRequestForPrize(){
		$num = count($this->_badgeRequireForPrize);
		if($num > 0){
			for($i=0;$i<$num;$i++){
				if(intval($this->_badgeRequireForPrize[$i]) != intval($this->_badgeHaveForPrize[$i])){
					return false;
				}
			}
			return true;
		}else{
			return false;
		}
	}
	
	function getPrizeImage($prize){
		return 'images/t-shirt.png';
	}
	
	function inputCodeSuccess($code){
		return $this->badgeHelper->redeem_code($this->_registerId,$code);
	}
	
	/* 
		mendapatkan daftar badges yg dimiliki oleh user
		jika tidak punya maka nilainya 0
		order by badge ASC
	*/
	function getUserBadge(){
		/* contoh query
		SELECT 
		IF(u.badge IS NULL, 0 ,u.badge) badge
		FROM 
		test_badge b
		LEFT JOIN test_user u
		ON u.badge=b.badge
		WHERE
		1
		ORDER BY b.badge;
		*/
		
		//echo $this->_registerId.'<hr />';
		//print $this->badgeHelper->get_user_badges($this->_registerId);
		//exit;
		
		$res = json_decode($this->badgeHelper->get_user_badges($this->_registerId));
		//print_r($res);
		//exit;
		
		$data = array();
		$badge = 12;
		$resdat = $res->data;
		$numres = count($resdat);
		for($i=1;$i<=$badge;$i++){
			$data[$i-1]['id'] = $i;
			$data[$i-1]['total'] = 0;
			for($j=0;$j<$numres;$j++){
				if( $resdat[$j]->badge_id == $i){
					$data[$i-1]['id'] = $i;
					$data[$i-1]['total'] = $resdat[$j]->total;
				}
			}
		}
		
		return $data;
		//return array(1,2,3,4,0,6,7,0,9,10,0,0);
	}
	
	/*
		Submit badge trade
		$have = id badge yg mau ditukar
		$req = id badge yg mau didapatkan
	*/
	function submitTrade($have,$req){
		
		$res = json_decode($this->badgeHelper->auction_post($this->_registerId,$req,$have));
		/*
		print_r($res);
		print 'status => '.$res->status;
		exit;
		*/
		/*
		if( $res->status == 1){
			return true;
		}
		
		return false;
		*/
		return $res;
	}
	
	/*
		Mendapatkan list user yg ingin mendapatkan badge tertentu
	*/
	function getUserWantBadge($need,$with){
		//echo $need.' - '.$with;exit;
		$res = json_decode($this->badgeHelper->search_auction($this->_registerId,$with,$need));
		
		//print_r($res);
		//exit;
		$this->open(0);
		$data = $res->data;
		$dat = array();
		$no = 0;
		//$regid = '';
		foreach($data as $k => $v){
			$regid = $v->user_id;
			$qry = "SELECT * FROM social_member WHERE register_id='$regid';";
			$rs = $this->fetch($qry);
			$dat[$no] = array('name'=>$rs['name'],'register_id'=>$rs['register_id'],'img'=>$rs['img'],'auction_id'=>$v->auction_id);
			$no++;
		}
		//$regid = trim(substr($regid,0,-1));
		//echo $regid;
		//exit;
		
		//$qry = "SELECT * FROM social_member WHERE register_id IN ($regid);";
		//$rs = $this->fetch($qry,1);
		
		//echo mysql_error();
		//echo $qry;
		//exit;
		$this->close();
		/*
		$num = count($rs);
		$dat = array();
		for($i=0;$i<$num;$i++){
			$dat[$i] = array('name'=>$rs[$i]['name'],'register_id'=>$rs[$i]['register_id'],'img'=>$rs[$i]['img']);
		}
		*/
		return $dat;
		
		/*
		return array(
							array(	"name"=>"Moss",
										"register_id"=>"19999",
										"img"	=> "images/no_avatar.jpg"
									),
							array(	"name"=>"Moss2",
										"register_id"=>"19999",
										"img"	=> "images/no_avatar.jpg"
									),
							array(	"name"=>"Moss3",
										"register_id"=>"19999",
										"img"	=> "images/no_avatar.jpg"
									)
							);
		*/
	}
	
	function getUserProfileAndBadge($regid){
		
		$this->open(0);
		$qry = "SELECT m.*,c.city AS kota FROM social_member m LEFT JOIN mop_city_lookup c ON c.id=m.city WHERE register_id='$regid'";
		$rs = $this->fetch($qry);
		$this->close();
		
		$rand1 = rand(1000000000,9999999999);
		$rand2 = rand(100000000,999999999);
		$desc = $rs['sex']." < ".strtoupper($rs['last_name'])." < < ".strtoupper($rs['name'])." < < < < < < < < < < < < < < < < < < < < < < < M".$rand1." < 0IND".$rand2." < < < < < < < < < < < < < < < < < < < < <";
		$rs['description'] = $desc;
		
		/*
			array badge berisi jumlah dan urutan berdasarkan id badgenya
		*/
		/*
		$data = array('name' => 'tester',
								'age' => '27',
								'city' => 'Jakarta',
								'date' => '2011-09-11',
								'img' => 'images/no_avatar.jpg',
								'register_id' => '19999',
								'badge' => array(5,3,4,5,3,2,4,6,0,0,0,2)
								);
		*/
		return $rs;
	}
	
	/*
		proses pertukaran badge
		return true jika berhasil, false jika gagal
	*/
	
	function confirmTradeRequest($mine,$your,$sellerId){
		//echo $mine.' - '.$your.' - '.$sellerId;exit;
		$res = json_decode($this->badgeHelper->trade($this->_registerId,$mine,$your,$sellerId));
		
		//print_r($res);exit;
		
		return array('status'=>$res->status,'msg'=>$res->message, 'badge' => $your);
	}
}