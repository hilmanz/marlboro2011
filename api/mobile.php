<?php
include_once "bootstraps.php";
include_once "../config/config.inc.php";
session_start();
$auth = new BaseAuth();
if($auth->authenticated()){
	$api = new MobileAPI();
	$api->run();
}else{
	print "Access Denied !";
}
?>