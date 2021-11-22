<?php
include("./vendor/sleekcommerce/init.inc.php");
include("./vendor/facebook/facebook.inc.php");
ConfCtl::CheckConf();
include("./conf.inc.php");

$action=$_REQUEST["id_action"];
$save=$_REQUEST["save"];
$remote_session=$_REQUEST["remote_session"];
if($remote_session!="")
 {
   $sr=new SleekshopRequest();
   $res=$sr->get_user_data($remote_session);
   $res=json_decode($res);
   if((string)$res->object=="error") die("PERMISSION_DENIED");
 }
if($action=="") $action=1;
if(SERVER=="" OR LICENCE_USERNAME=="" OR LICENCE_PASSWORD=="" OR APPLICATION_TOKEN=="") $action=2;
if($save==1) $action=3;
if(SERVER != "" AND LICENCE_USERNAME != "" AND LICENCE_PASSWORD != "" AND APPLICATION_TOKEN != "") $action=4;
//When application-page is called
if($action==1)
{
  if($remote_session=="")
  {
   $token=$_GET["token"];
   $sr=new SleekshopRequest();
   $res=$sr->instant_login($token);
   $res=json_decode($res);
   $status=(string)$res->status;
   if($status!="SUCCESS") die("PERMISSION_DENIED");
   $remote_session=(string)$res->remote_session;
  }
   echo "<h3>Welcome to the facebook-feed app for sleekshop (initial-setup) / v 1.0.0 beta</h3>";
   echo "<form method='post' action='index.php?id_action=3&save=1'>
   Api Endpoint<br>
   <input type='text' name='api_endpoint' placeholder='API Endpoint' value='".SERVER."'><br><br>
   Licence username<br>
   <input type='text' name='licence_username' placeholder='Licence username' value='".LICENCE_USERNAME."'><br><br>
   Licence password<br>
   <input type='text' name='licence_password' placeholder='Licence password' value='".LICENCE_PASSWORD."'><br><br>
   Application token<br>
   <input type='text' name='application_token' placeholder='Application token' value='".APPLICATION_TOKEN."'><br><br>
   <hr>
   Facebook category id<br>
   <input type='text' name='facebook_category_id' placeholder='Facebook category id' value='".FACEBOOK_CATEGORY_ID."'><br><br>
   Base URL<br>
   <input type='text' name='base_url' placeholder='Base URL' value='".BASE_URL."'><br><br>";
   echo "<input type='hidden' name='remote_session' value='".$remote_session."'>";
   echo "<input type='submit' value='submit'></form>";
}

//When configuration is not complete
if($action==2)
 {
   echo "<h3>Welcome to the facebook-feed app for sleekshop (initial-setup) / v 1.0.0 beta</h3>";
   echo "<form method='post' action='index.php?id_action=3&save=1'>
   Api Endpoint<br>
   <input type='text' name='api_endpoint' placeholder='API Endpoint' value='".SERVER."'><br><br>
   Licence username<br>
   <input type='text' name='licence_username' placeholder='Licence username' value='".LICENCE_USERNAME."'><br><br>
   Licence password<br>
   <input type='text' name='licence_password' placeholder='Licence password' value='".LICENCE_PASSWORD."'><br><br>
   Application token<br>
   <input type='text' name='application_token' placeholder='Application token' value='".APPLICATION_TOKEN."'><br><br>
   <hr>
   Facebook category id<br>
   <input type='text' name='facebook_category_id' placeholder='Facebook category id' value='".FACEBOOK_CATEGORY_ID."'><br><br>
   Base URL<br>
   <input type='text' name='base_url' placeholder='Base URL' value='".BASE_URL."'><br><br>";
   echo "<input type='hidden' name='remote_session' value='".$remote_session."'>";
   echo "<input type='submit' value='submit'></form>";
 }


 //When configuration is posted
 if($action==3)
  {
    $api_endpoint=$_POST["api_endpoint"];
    $licence_username=$_POST["licence_username"];
    $licence_password=$_POST["licence_password"];
    $application_token=$_POST["application_token"];
    $facebook_category_id=$_POST["facebook_category_id"];
    $base_url=$_POST["base_url"];
    ConfCtl::CreateConf($api_endpoint,$licence_username,$licence_password,$application_token,$base_url,$facebook_category_id);
    echo "<h3>Welcome to the facebook-feed app for sleekshop / v 1.0.0 beta</h3>";
    echo "Updated the configuration, click <a href='index.php?remote_session=".$remote_session."'>here</a>";
  }


 //When configuration is already available
 if($action==4)
  {
    if($remote_session=="")
    {
    $token=$_GET["token"];
    $sr=new SleekshopRequest();
    $res=$sr->instant_login($token);
    $res=json_decode($res);
    $status=(string)$res->status;
    if($status!="SUCCESS") die("PERMISSION_DENIED");
    $remote_session=(string)$res->remote_session;
    }
    echo "<h3>Welcome to the facebook-feed app for sleekshop / v 1.0.0 beta</h3>";
    echo "Updated the configuration, click <a href='index.php?remote_session=".$remote_session."'>here</a>";
  }

 ?>
