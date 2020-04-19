<?php
error_reporting(0);
include("./conf.inc.php");
include("./vendor/sleekcommerce/init.inc.php");
include("./vendor/facebook/facebook.inc.php");
$constraint=array("name"=>array("LIKE",""),"category.id_shopcategory"=>intval(FACEBOOK_CATEGORY_ID));
$res=ShopobjectsCtl::SearchProducts($constraint,0,0);
$log=date("Y-m-d H-i-s")."\n";
file_put_contents('./logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
$csv=FacebookCtl::CreateCSV($res);
die($csv);
 ?>
