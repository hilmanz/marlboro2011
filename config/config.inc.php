<?php
include_once "locale.inc.php";
$GLOBAL_PATH = "../";
$APP_PATH = "../com/";
$ENGINE_PATH = "../engines/";
$WEBROOT = "../html/";

//set aplikasi yang digunakan
define('APPLICATION','marlboro');


$DEVELOPMENT_MODE = true;

//set TRUE jika dalam local
$CONFIG['LOCAL_DEVELOPMENT'] = true;

if($CONFIG['LOCAL_DEVELOPMENT']){
	$CONFIG['DATABASE'][0]['HOST'] 				= "202.80.113.52";
	$CONFIG['DATABASE'][0]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][0]['PASSWORD'] 	= "coppermine";
	$CONFIG['DATABASE'][0]['DATABASE'] 	= "mrlbconnection";
}else{
	$CONFIG['DATABASE'][0]['HOST'] 				= "202.80.113.52";
	$CONFIG['DATABASE'][0]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][0]['PASSWORD'] 	= "coppermine";
	$CONFIG['DATABASE'][0]['DATABASE'] 	= "mrlbconnection";
}
//Time to check session log
$CONFIG['MOP_CHECK_TIME'] = 10; //menit

$CONFIG['MOP_DEBUG_URL'] = "http://localhost/marlboro2011/dev/public_html/index2.php";
$CONFIG['MOP_LANDING_URL'] = "http://localhost/marlboro2011/dev/public_html/index2.php";
$CONFIG['page_path'] = "http://localhost/sittipro/a-music/branches/dev/html/page.php?u=";
$CONFIG['page_home'] = "http://localhost/sittipro/a-music/branches/dev/page.php";
$CONFIG['API_URL'] = "http://localhost/sittipro/a-music/branches/dev/api/";

$CONFIG['MOP_URL'] = "https://staging-marlboro-id.es-dm.com/dm.mopid.webservice/centralwebservice.asmx";
$CONFIG['MOP_USER'] = "hosting\pmimopID";
$CONFIG['MOP_PWD'] = "Pm1jkd!";

$CPMOO['REGISTRATION_ONLINE'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB088",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['BRANDED_WEBSITE_LOGIN'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB083",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['REGISTRATION_OFFLINE'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB089",
				"CPAOType"=>"R",
				"siteID"=>"11");
	
$CPMOO['Invite'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB090",
				"CPAOType"=>"R",
				"siteID"=>"11");			

$CPMOO['Thankyou'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB091",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['ReferralCode_Code1'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB096",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['ReferralCode_Code2'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB097",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['REDEEM_BADGES'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB113",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['TRADING_BADGES'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB114",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['GET_BADGES'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB115",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['MOBILE_ACCESS'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"WEB116",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['PACKAGE_FOR_RESPONSE_UPDATE_IN_ARC'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"MLBCC-OfferCode",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CPMOO['PACKAGE_FOR_INVITE_DM_SMS_EMAIL'] = array("WebSessionLanguage"=>"",
			   "Campaign"=>"ID11000423A11",
				"Phase"=>"PH01",
				"Audience"=>"A001",
				"MediaCategory"=>"OBW",
				"OfferCategory"=>"WEB",
				"OfferCode"=>"Invite",
				"CPAOType"=>"R",
				"siteID"=>"11");

$CONFIG['BADGE_API'] = "http://192.168.77.60/marlboro/dev/api/index.php";

?>
