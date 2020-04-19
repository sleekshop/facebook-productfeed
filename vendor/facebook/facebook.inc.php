<?php

class FacebookCtl
{

  function __construct()
  {

  }

  public static function CreateCSV($res=array())
  {
    $csv="id;title;description;availability;inventory;condition;price;link;image_link;brand\n";
    foreach($res["products"] as $product)
    {
      $id=$product["id"];
      $name=$product["attributes"]["name"]["value"];
      $description=$product["attributes"]["short_description"]["value"];
      $availability=$product["availability_label"];
      if($availability=="success")
      {
        $availability="in stock";
      }
      else {
        $availability="out of stock";
      }
      if($product["availability_label"]=="success")
      {
        if($product["availability_quantity"]>0)
        {
          $inventory=$product["availability_quantity"];
        }
        else {
          $inventory=1;
        }
      }
      else {
        $inventory=0;
      }
      $condition="new";
      $price=$product["attributes"]["price"]["value"];
      if($product["permalink"]!="")
      {
        $link=BASE_URL.$product["permalink"];
      }
      else {
        $link=BASE_URL.$product["id"];
      }
      $image_link=$product["attributes"]["img1"]["value"];
      $brand="test";
      $csv.=$id.";".$name.";".$description.";".$availability.";".$inventory.";".$condition.";".$price.";".$link.";".$image_link.";".$brand."\n";
    }
    return($csv);
  }

}

?>
