<?php
class games extends App{
	var $Request;
	var $View;
	var $user;
	function __construct($req){
		$this->Request = $req;
		$this->View = new BasicView();
		$this->setVar();
		$this->user = $this->getUserInfo();
	}
	function home(){
		$this->View->assign('register_id',$this->user['register_id']);
		$this->View->assign('session_id',session_id());
		return $this->View->toString(APPLICATION.'/games.html');
	}
	function berlin_wall(){
		return $this->View->toString(APPLICATION.'/games-berlin-wall.html');
	}
	function dj(){
		return $this->View->toString(APPLICATION.'/games-dj.html');
	}
	function yacht(){
		return $this->View->toString(APPLICATION.'/games-yacht.html');
	}
	function art_museum(){
		return $this->View->toString(APPLICATION.'/games-art-museum.html');
	}
}
