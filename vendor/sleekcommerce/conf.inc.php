<?php

class ConfCtl
{

  function __construct()
  {

  }

public static function CheckConf()
 {
   if(file_exists("./conf.inc.php")) return(true);
   self::CreateConf("","","","","",0);
 }

public static function CreateConf($api_endpoint="",$licence_username="",$licence_password="",$application_token="",$base_url="",$facebook_category_id=0)
 {
   $res=file_get_contents("./conf_tmp.inc.php");
   $res=str_replace("###API_ENDPOINT###",$api_endpoint,$res);
   $res=str_replace("###LICENCE_USERNAME###",$licence_username,$res);
   $res=str_replace("###LICENCE_PASSWORD###",$licence_password,$res);
   $res=str_replace("###APPLICATION_TOKEN###",$application_token,$res);
   $res=str_replace("###BASE_URL###",$base_url,$res);
   $res=str_replace("###FACEBOOK_CATEGORY_ID###",$facebook_category_id,$res);
   file_put_contents("./conf.inc.php",$res);
 }


}

?>
