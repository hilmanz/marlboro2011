<?php
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Paginate.php";
class code extends SQLData{
	function __construct($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		//$this->User = new UserManager();
	}
	function admin(){
		$act = $this->Request->getParam('act');
		if( $act == 'redeem-code' ){
			return $this->redeemCode();
		}elseif( $act == 'redeem-history' ){
			return $this->redeemHistory();
		}elseif( $act == 'edit-badge' ){
			return $this->editBadge();
		}elseif( $act == 'edit-badge-form' ){			
			return $this->editBadgeForm();					
		}elseif( $act == 'redeem-request' ){
			return $this->redeemRequest();
		}elseif( $act == 'edit-badgeRequest' ){
			return $this->editBadgeRequest();					
		}elseif( $act == 'edit-badgeRequest-form' ){
			return $this->editBadgeRequestForm();
		}else{
			return $this->codeGenerator();
		}
	}
	
	function codeGenerator(){
		
		include_once "../../api/bootstraps.php";
		if($_REQUEST['amount']!=NULL){
			$req = http_build_query($_REQUEST);
			$url=$service_uri.'?method=generate_code&'.$req;
			$resp = file_get_contents($url);
			//print $url;
			
			$rs = json_decode($resp);
			if(is_array($rs->data)):
				$no=1;
				$code = "";
				foreach($rs->data as $data):
					$code .= '<tr>';
					$code .= '<td>'.$no.'</td>';
					$code .= '<td>'. $data.'</td>';
					$code .= '</tr>';
					$no++;
				endforeach;
			endif;
			
			$this->View->assign('code',$code);
		}
		
		return $this->View->toString("marlboro/admin/code.html");
	}

	function redeemCode(){
		$channel = intval($this->Request->getParam('channel'));
		$where_channel = ($channel == 0) ? '' : " AND channel='$channel' ";
		
		$start = intval($this->Request->getParam('st'));
		$qry = "SELECT count(*) total FROM mbc_db.badge_code b LEFT JOIN mbc_db.badge_channel c ON b.channel=c.channel_id WHERE 1 $where_channel;";
		$list = $this->fetch($qry);
		$total = $list['total'];
		$total_per_page = 50;
		
		$qry = "SELECT b.*,c.channel_name FROM mbc_db.badge_code b LEFT JOIN mbc_db.badge_channel c ON b.channel=c.channel_id WHERE 1 $where_channel LIMIT $start,$total_per_page;";
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);
		
		$this->Paging = new Paginate();
		$this->View->assign("paging",$this->Paging->getAdminPaging($start, $total_per_page, $total, "?s=code&act=redeem-code&channel=$channel"));
		
		$qry = "SELECT * FROM mbc_db.badge_channel";
		$ch = $this->fetch($qry,1);
		$this->View->assign('ch',$ch);
		$this->View->assign('channel',$channel);
		
		return $this->View->toString("marlboro/admin/redeem-code.html");
	}
	
	function redeemHistory(){
		
		$start = intval($this->Request->getParam('st'));
		$qry = "SELECT count(*) total FROM mbc_db.badge_redeem r LEFT JOIN mbc_db.badge_inventory i ON r.id=i.redeem_id;";
		$list = $this->fetch($qry);
		$total = $list['total'];
		$total_per_page = 50;
		
		$qry = "SELECT * FROM mbc_db.badge_redeem r LEFT JOIN mbc_db.badge_inventory i ON r.id=i.redeem_id LIMIT $start,$total_per_page;";
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);
		
		$this->Paging = new Paginate();
		$this->View->assign("paging",$this->Paging->getAdminPaging($start, $total_per_page, $total, "?s=code&act=redeem-history"));
		
		return $this->View->toString("marlboro/admin/redeem-history.html");
	}
	
	function editBadge(){
		$code = $_GET['code'];
		if($code != ""){
			$code = str_replace(' ','',$code);
			$code = str_replace(',','\',\'',$code);
			$qry = "SELECT * FROM mbc_db.badge_code WHERE kode IN ('$code');";
			//echo $qry;exit;
			$list = $this->fetch($qry,1);
			$this->View->assign('list',$list);
			$this->View->assign('search','1');
		}
		return $this->View->toString("marlboro/admin/edit-badge.html");
	}
	
	function editBadgeForm(){
		$code = $_GET['code'];
		$edit = intval($_GET['edit']);
		if($edit==1){
			$start = mysql_escape_string($_GET['start']);
			$end = mysql_escape_string($_GET['end']);
			$qry = "UPDATE mbc_db.badge_code SET start_date='$start', end_date='$end' WHERE kode='$code';";
			//echo $qry;exit;
			if($this->query($qry)){
				return $this->View->showMessage('Edit success','index.php?s=code&act=edit-badge');
			}else{
				return $this->View->showMessage('Edit failed','index.php?s=code&act=edit-badge');
			}
		}
		$qry = "SELECT * FROM mbc_db.badge_code WHERE kode='$code';";
		$list = $this->fetch($qry);
		$this->View->assign('list',$list);
		return $this->View->toString("marlboro/admin/edit-badge-form.html");
	}
	
	function redeemRequest(){
		
		$start = intval($this->Request->getParam('st'));
		$qry = "SELECT COUNT(*) total 
				FROM social_member a
				RIGHT JOIN social_redeem b 
				ON a.register_id=b.register_id ;";
		$list = $this->fetch($qry);
		$total = $list['total'];
		$total_per_page = 50;
		
		$qry = "SELECT 
					b.id as id,
					a.register_id as regid,
					name AS Nama,
					prize AS Prize,
					submit_date AS Tanggal,
					n_status AS Status
				FROM social_member a
				RIGHT JOIN social_redeem b 
				ON a.register_id=b.register_id
				LIMIT $start,$total_per_page;";
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);		
		$this->Paging = new Paginate();
		$this->View->assign("paging",$this->Paging->getAdminPaging($start, $total_per_page, $total, "?s=code&act=redeem-request"));		
		return $this->View->toString("marlboro/admin/redeem-request.html");
	}
	
	function editBadgeRequest(){
		$id = $this->Request->getParam('id');	
		$regid = $this->Request->getParam('regid');	
		$qry = "SELECT 
					b.id as id,
					a.register_id as regid,
					a.name AS Nama,
					b.street AS Street, 
					b.complex AS Complex, 
					b.province AS Province, 
					b.city AS City,
					b.prize AS Prize, 
					b.phone AS Phone, 
					b.mobile AS Mobile,
					b.Prize AS Prize, 
					b.submit_date AS Tanggal, 
					b.n_status AS Status,
					b.transaction_id
				FROM social_member a
				INNER JOIN social_redeem b 
				ON b.id='$id' AND a.register_id='$regid' LIMIT 1 ;";
		//echo $qry;		
		$r = $this->fetch($qry);		
		$this->View->assign("id", $r['id']);
		$this->View->assign("regid", $r['regid']);
		$this->View->assign("Nama", $r['Nama']);
		$this->View->assign("Street", $r['Street']);
		$this->View->assign("Complex", $r['Complex']);	
		$this->View->assign("Province", $r['Province']);	
		$this->View->assign("City", $r['City']);		
		$this->View->assign("Prize", $r['Prize']);	
		$this->View->assign("Phone", $r['Phone']);
		$this->View->assign("Mobile", $r['Mobile']);	
		$this->View->assign("Prize", $r['Prize']);	
		$this->View->assign("Tanggal", $r['Tanggal']);		
		$this->View->assign("Status", $r['Status']);
		$this->View->assign("transaction_id", $r['transaction_id']);		
		return $this->View->toString("marlboro/admin/edit-badgeRequest-form.html");
	}
	
	function editBadgeRequestForm(){
		$edit = intval($_GET['edit']);
		$id = intval($_GET['id']);
		$Status = intval($_GET['Status']); 
		if($edit==1 && $Status > 0){
			global $APP_PATH;
			include_once $APP_PATH.'marlboro/helper/codeHelper.php';
			include_once $APP_PATH.'marlboro/helper/BadgeHelper.php';
			//$codeHelper = new codeHelper($_GET['regid']);
			$badgeHelper = new BadgeHelper('badge_api');
			//$codeHelper->getBadgeRequestForPrize($_GET['prize']);
			//$codeHelper->checkBadgeRequestForPrize($_GET['prize']);
			$que = "SELECT n_status FROM social_redeem WHERE id=$id LIMIT 1;";
			$rs = $this->fetch($que);
			$nstatus=$rs['n_status'];
					if($nstatus==0){
						
						if( $Status == 1){
							//Status Approve
							//if($codeHelper->checkAllowRequestForPrize()){
								$qry = "UPDATE social_redeem SET n_status='$Status' WHERE social_redeem.id='$id';";
								if($this->query($qry)){
									$res = json_decode($badgeHelper->approve_redeem($_GET['regid'],$_GET['transaction_id']));
									return $this->View->showMessage('Edit Success','index.php?s=code&act=redeem-request');
								}else{
									return $this->View->showMessage('Edit Failed','index.php?s=code&act=redeem-request');
								} 
							//}else{
								//return $this->View->showMessage('Don\'t have enough badges!','index.php?s=code&act=redeem-request');
							//}
						}elseif($Status == 2){
							//Status cancel
							$qry = "UPDATE social_redeem SET n_status='$Status' WHERE social_redeem.id='$id';";
							if($this->query($qry)){
								$res = json_decode($badgeHelper->cancel_redeem($_GET['regid'],$_GET['transaction_id']));
								return $this->View->showMessage('Edit Success','index.php?s=code&act=redeem-request');
							}else{
								return $this->View->showMessage('Edit Failed','index.php?s=code&act=redeem-request');
							}
						}
						
					}
		}
		return $this->View->toString("marlboro/admin/edit-badgeRequest-form.html");
	}
}