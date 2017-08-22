<?php
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Paginate.php";
class user extends SQLData{
	function __construct($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		$this->User = new UserManager();
	}
	function admin(){
		$act = $this->Request->getParam('act');
		if( $act == 'detail' ){
			return $this->userDetail();
		}elseif( $act == 'listTracking' ){
			return $this->ListTracking();
		}else{
			return $this->userList();
		}
	}

	function userList(){
		$channel = intval($this->Request->getParam('channel'));
		$where_channel = ($channel == 0) ? '' : " AND channel='$channel' ";
		
		$start = intval($this->Request->getParam('st'));
		$qry = "SELECT count(*) total FROM mrlbconnection.social_member WHERE 1 ORDER BY NAME;";
		$list = $this->fetch($qry);
		$total = $list['total'];
		$total_per_page = 50;
		
		$qry = "SELECT * FROM mrlbconnection.social_member WHERE 1 ORDER BY NAME LIMIT $start,$total_per_page;";
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);
		
		$this->Paging = new Paginate();
		$this->View->assign("paging",$this->Paging->getAdminPaging($start, $total_per_page, $total, "?s=user"));
		
		return $this->View->toString("marlboro/admin/user-list.html");
	}
	
	function userDetail(){
		$id = intval($this->Request->getParam('id'));
		$qry = "SELECT * FROM mbc_db.badge_inventory WHERE user_id='$id';";
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);
		return $this->View->toString("marlboro/admin/user-detail.html");
	}
	
	function ListTracking(){
		$id = intval($this->Request->getParam('id'));
		$nm = $this->Request->getParam('nm');
		$start = intval($this->Request->getParam('st'));
		$qry = "SELECT COUNT(*) AS total 
				FROM (	SELECT 
							a.name AS name,
							b.user_id AS userID,
							b.page AS page,
							b.time AS time
						FROM social_member a
						INNER JOIN social_tracking b
						ON b.user_id='$id' AND a.name='$nm'
						ORDER BY b.time 
					 ) 
				AS track ;";
		//echo $qry."<br>";
		$list = $this->fetch($qry);
		$total = $list['total'];
		$total_per_page = 50;
		
		$qry = "SELECT 
					a.name AS name,
					b.user_id AS userID,
					b.page AS page,
					b.time AS time
				FROM social_member a
				INNER JOIN social_tracking b
				ON b.user_id='$id' AND a.name='$nm'
				ORDER BY b.time LIMIT $start,$total_per_page; ";
		//echo "<br>".$qry;
		$list = $this->fetch($qry,1);
		$this->View->assign('list',$list);
		$this->View->assign('nm',$nm);
				
		$this->Paging = new Paginate();
		$this->View->assign("paging",$this->Paging->getAdminPaging($start, $total_per_page, $total, "?s=user&act=listTracking&id=$id&nm=$nm"));		
		return $this->View->toString("marlboro/admin/user-listtracking.html");
	}
	
}