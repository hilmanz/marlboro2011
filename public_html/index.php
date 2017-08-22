<?php
include_once "common.php";
include_once $ENGINE_PATH."Utility/SessionManager.php";
include_once $APP_PATH . APPLICATION . '/App.php';
include_once $APP_PATH."Interaction/Interaction.php";

//MOP
include_once $APP_PATH."MOP/MOPClient_2.php";
include_once $APP_PATH."MOP/MopTracker.php";
$mop_client = new MopClient($req);
$mop = new MopTracker();

$view = new BasicView();

if($CONFIG['LOCAL_DEVELOPMENT']){
	//gak pake mop
	$CONFIG['MOP_LANDING_URL'] = $CONFIG['MOP_DEBUG_URL'];
	
	$app = new App(&$req);
	$app->main();
	print $app;
	die();
}
