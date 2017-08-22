<?php
global $APP_PATH;
include_once $APP_PATH.'marlboro/helper/codeHelper.php';
include_once $APP_PATH.'marlboro/helper/newsHelper.php';
include_once $APP_PATH.'marlboro/helper/BadgeHelper.php';
class code extends App{
	var $Request;
	var $View;
	var $user;
	var $codeHelper;
	var $newsHelper;
	var $badgeHelper;
	
	function __construct($req){
		$this->Request = $req;
		$this->View = new BasicView();
		$this->setVar();
		$this->user = $this->getUserInfo();
		$this->codeHelper = new codeHelper($this->user['register_id']);
		$this->newsHelper = new newsHelper($this->user['register_id']);
		$this->badgeHelper = new BadgeHelper('badge_api');
	}
	function home(){
		return $this->View->toString(APPLICATION.'/code.html');
	}
	function submit(){
		if(!$_COOKIE['DISABLE_INPUT_CODE']){
			$_code = $_POST['code'];
			$_captcha = $_POST['captcha'];
			$_valid = (md5($_captcha) == $_SESSION['mrlbCaptchaSimple']) ? true : false;
			if($_code != '' && $_captcha != '' && $_valid){
				$res=json_decode($this->codeHelper->inputCodeSuccess($_code));
				if(intval($res->status) == 1){
					setcookie("COUNT_INPUT_CODE", "", time()-3600);
					$this->newsHelper->unlockBadge($res->data->badge->name,$res->data->badge->id);
					echo json_encode($res);
				}else{
					setcookie("COUNT_INPUT_CODE", intval($_COOKIE['COUNT_INPUT_CODE'])+1, time() + (1*60) );
					if( $_COOKIE['COUNT_INPUT_CODE'] >= 3 ){
						setcookie("DISABLE_INPUT_CODE", true, time() + (1*60) );
						setcookie("COUNT_INPUT_CODE", "", time()-3600);
					}
					echo json_encode($res);
				}
			}else{
				echo json_encode(array('status'=>0));
			}
		}else{
			echo json_encode(array('status'=>666));
		}
		exit;
	}
	function yourbadges(){
		return $this->View->toString(APPLICATION.'/code.html');
	}
	function traderequestmatch(){
		$want = intval($_GET['want']);
		$badge = intval($_GET['badge']);
		
		$list = $this->codeHelper->getUserWantBadge($want,$badge);
		
		$this->View->assign('list',$list);
		$this->View->assign('want',$want);
		$this->View->assign('badge',$badge);
		$this->View->assign('name',$this->user['name']);
		
		return $this->View->toString(APPLICATION.'/traderequestmatch.html');
	}
	
	function prize(){
		//$profile = parent::getMopProfile();
		
		$prize = $_GET['prize'];
		if( $prize != ''){
			$require=$this->codeHelper->getBadgeRequestForPrize($prize);
			$have=$this->codeHelper->checkBadgeRequestForPrize($prize);
			$allow = $this->codeHelper->checkAllowRequestForPrize() ? 1 : 0;
			$this->View->assign('require',$require);
			$this->View->assign('have',$have);
			$this->View->assign('allow',$allow);
			$this->View->assign('prize',$prize);
			
			$this->open(0);
			$qry = "SELECT
							id,
							register_id,
							street StreetName,
							complex,
							province,
							city,
							phone,
							mobile MobilePhone
						FROM social_redeem WHERE register_id='".$this->user['register_id']."' ORDER BY id DESC LIMIT 1;";
			$data = $this->fetch($qry);
			
			if(intval($data['id']) <= 0){
				$data = $this->user;
				$qry = "SELECT city FROM mop_city_lookup WHERE id='".$this->user['city']."'";
			}else{
				$this->View->assign('data',$data);
				$rs['city'] = $data['city'];
			}
			
			$qry2 = "SELECT * FROM mop_city_lookup ORDER BY city ASC;";
			
			$rs = $this->fetch($qry);
			$city = $this->fetch($qry2,1);
			$this->close();
			
			$this->View->assign('kota',$rs['city']);
			$this->View->assign('city',$city);
			
			return $this->View->toString(APPLICATION.'/redeem-input.html');
		}
		return $this->View->toString(APPLICATION.'/redeem-badge.html');
	}
	
	function prizesubmit(){
		$prize = $_POST['prize'];
		$_street = $_POST['street'];
		$_complex = $_POST['complex'];
		$_province = $_POST['province'];
		$_city = $_POST['city'];
		$_phone = $_POST['phone'];
		$_mobile = $_POST['mobile'];
		$_agree = $_POST['agree'];
		
		if(!$_agree){
			//return $this->View->showMessage('You don\'t agree with us, please check agree!','index.php?page=code&act=prize');
			$data = array('status'=>0,'message'=>'You don\'t agree with us, please check agree!');
		}
		
		//echo $prize.' - '.$_street.' - '.$_complex.' - '.$_province.' - '.$_city.' - '.$_phone.' - '.$_mobile;exit;
		
		if( $prize != '' && $_street!='' && $_complex!='' && $_province!='' && $_city!='' && $_phone!='' && $_mobile!='' ){
			$this->codeHelper->getBadgeRequestForPrize($prize);
			$this->codeHelper->checkBadgeRequestForPrize($prize);
			if($this->codeHelper->checkAllowRequestForPrize()){
				global $PRIZE;
				$res = json_decode($this->badgeHelper->badge_redeemed($this->user['register_id'],$PRIZE[$prize],$prize));
				if( $res->status == 1){
					$transaction_id = $res->data->transaction_id;
					$qry = "INSERT INTO social_redeem 
								(register_id,street,complex,province,city,phone,mobile,prize,submit_date,transaction_id)
								VALUES
								('".$this->user['register_id']."','$_street','$_complex','$_province','$_city','$_phone','$_mobile','$prize',NOW(),'$transaction_id');";
					$this->open(0);
					if($this->query($qry)){
						$data = array('status'=>1,'message'=>'Redeem Success', 'url' => 'index.php?page=code&act=sendprize&prize='.$prize);
						//sendRedirect('index.php?page=code&act=sendprize&prize='.$prize);
						//exit;
					}else{
						//sendRedirect('index.php?page=code&act=prize');
						//exit;
						$data = array('status'=>0,'message'=>'Redeem Failed, Please Try Again!');
					}
				}else{
					$data = array('status'=>0,'message'=>'Redeem Failed, Please Try Again!');
				}
			}else{
				//return $this->View->showMessage('Please complete your badges before','index.php?page=code&act=prize');
				$data = array('status'=>0,'message'=>'You don\'t have enough badges for this merchandise');
			}
		}else{
			$data = array('status'=>0,'message'=>'Complete The Form Please');
		}
		//return $this->View->showMessage('Completed the form please!','index.php?page=code&act=prize');
		echo json_encode($data);
		exit;
	}
	
	function sendprize(){
		$prize = $_GET['prize'];
		$require=$this->codeHelper->getBadgeRequestForPrize($prize);
		$this->View->assign('require',$require);
		$this->View->assign('prizeimage',$this->codeHelper->getPrizeImage());
		return $this->View->toString(APPLICATION.'/redeem-success.html');
	}
	
	function trade(){
		$have=$this->codeHelper->getUserBadge();
		//print_r($have);exit;
		$this->View->assign('have',$have);
		return $this->View->toString(APPLICATION.'/badge.html');
	}
	
	function submittrade(){
		$_have = intval($_POST['have']);
		$_req = intval($_POST['req']);
		
		if($_have != '' && $_req != ''){
			/*
			if($this->codeHelper->submitTrade($_have,$_req)){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
			*/
			echo json_encode($this->codeHelper->submitTrade($_have,$_req));
		}else{
			echo json_encode(array('status'=>0,'message'=>'Choose your badge!'));
		}
		exit;
	}
	
	function getmopprofile(){
		$regid=$_POST['regid'];
		
		if( $regid == '' || $regid == 0){
			echo json_encode(array('status'=>0));
			exit;
		}else{
			$list=$this->codeHelper->getUserProfileAndBadge($regid);
			echo json_encode(array('status'=>1,'data' => $list));
			exit;
		}
	}
	
	function confirmtraderequest(){
		$mine = intval($_POST['mine']);
		$your = intval($_POST['your']);
		$sellerId = $_POST['sellerId'];
		
		$res = $this->codeHelper->confirmTradeRequest($mine,$your,$sellerId);
		
		if($res['status'] == 1){
			//echo "masuk cuy";
			//exit;
			$this->newsHelper->trade($your,$mine,$sellerId);
		}
		
		echo  json_encode($res);
		exit;
	}
}