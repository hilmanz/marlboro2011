<?php
$users = array(
			array("name"=>"Moss","email"=>"moss@sitti.co.id","username"=>"moss","register_id"=>"10001"),
			array("name"=>"Jen","email"=>"sarah@sitti.co.id",'username'=>'jen',"register_id"=>"10002"),
			array("name"=>"Roy","email"=>"roy@sitti.co.id","username"=>"roy","register_id"=>"10003"),
			array("name"=>"User 1","email"=>"moss2@sitti.co.id","username"=>"moss2","register_id"=>"10004"),
			array("name"=>"User 2","email"=>"user2@sitti.co.id",'username'=>'user2',"register_id"=>"10005"),
			array("name"=>"User 3","email"=>"roy2@sitti.co.id","username"=>"user3","register_id"=>"10006")
		);
$token = array(123456,654321,111111,11221122,33223322,4444444);
$user_token = array("123456"=>0,"654321"=>1,"111111"=>2,"11221122"=>3,"33223322"=>4,"4444444"=>5);

if($_REQUEST['GetProfile']=="1"):
	$sesstoken = $_REQUEST['id'];
	$o = $users[$user_token[$sesstoken]];
	print json_encode($o);
else:
	$sesstoken=$token[rand(0,2)];
	//print "<a href='../sba/html/index.php?id=".$sesstoken."'>Enter Website</a>";
?>
<h1>MOP Dummy</h1>
	<form action="http://localhost/marlboro2011/public_html/index.php">
	Login as : 
	<!--
	<select id="id" name="id">
		<option value="2118824">Vera</option>
	</select>
	-->
	<input type="hidden" name="id" value="123" />
	<input type="text" name="username" value="kia@kana.co.id" />
	<input type="password" name="password" value="abcd1234" />
	<input type="submit" value="Login"/>
	</form>
<?php
endif;
?>
