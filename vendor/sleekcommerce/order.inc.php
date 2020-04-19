<?php

class OrderCtl
{

  function __construct()
  {

  }



private static function get_order_details($json="")
{
	$result=array();
	$result["id_user"]=(int)$json->user->id_user;
	$result["username"]=(string)$json->user->username;
	$result["order_id_payment_method"]=(int)$json->order_payment_method->id;
	$result["order_payment_method"]=(string)$json->order_payment_method->name;
	$result["order_id_delivery_method"]=(int)$json->order_delivery_method->id;
	$result["order_delivery_method"]=(string)$json->order_delivery_method->name;
	$result["order_id_payment_state"]=(int)$json->order_payment_state->id;
	$result["order_payment_state"]=(string)$json->order_payment_state->name;
	$result["order_id_delivery_state"]=(int)$json->order_delivery_state->id;
	$result["order_delivery_state"]=(string)$json->order_delivery_state->name;
	$result["id_order_state"]=(int)$json->order_state->id;
	$result["order_state"]=(string)$json->order_state->name;
	$result["id_order_type"]=(int)$json->order_type->id;
	$result["order_type"]=(string)$json->order_type->name;
	$result["order_number"]=(string)$json->order_number;
	$result["username_creator"]=(string)$json->username_creator;
	$result["creation_date"]=(string)$json->creation_date;
	$result["username_modifier"]=(string)$json->username_modifier;
	$result["modification_date"]=(string)$json->modification_date;
	$result["delivery_companyname"]=(string)$json->order_delivery_companyname;
	$result["delivery_department"]=(string)$json->order_delivery_department;
	$result["delivery_salutation"]=(string)$json->delivery_salutation;
	$result["delivery_firstname"]=(string)$json->delivery_firstname;
	$result["delivery_lastname"]=(string)$json->delivery_lastname;
	$result["delivery_street"]=(string)$json->delivery_street;
	$result["delivery_number"]=(string)$json->delivery_number;
	$result["delivery_zip"]=(string)$json->delivery_zip;
	$result["delivery_state"]=(string)$json->delivery_state;
	$result["delivery_city"]=(string)$json->delivery_city;
	$result["delivery_country"]=(string)$json->delivery_country;
	$result["invoice_companyname"]=(string)$json->invoice_companyname;
	$result["invoice_department"]=(string)$json->invoice_department;
	$result["invoice_salutation"]=(string)$json->invoice_salutation;
	$result["invoice_firstname"]=(string)$json->invoice_firstname;
	$result["invoice_lastname"]=(string)$json->invoice_lastname;
	$result["invoice_street"]=(string)$json->invoice_street;
	$result["invoice_number"]=(string)$json->invoice_number;
	$result["invoice_zip"]=(string)$json->invoice_zip;
	$result["invoice_state"]=(string)$json->invoice_state;
	$result["invoice_city"]=(string)$json->invoice_city;
	$result["invoice_country"]=(string)$json->invoice_country;
	$result["note"]=(string)$json->note;
	$result["email"]=(string)$json->email;
	return($result);
}


/*
 * Set order details
 */
public static function SetOrderDetails($session="",$args=array())
 {
 	$sr=new SleekShopRequest();
 	$json=$sr->set_order_details($session,$args);
 	$json=json_decode($json);
 	return(self::get_order_details($json));
 }


 /*
  * Gets the order details
  */
 public static function GetOrderDetails($session="")
 {
 	$sr=new SleekShopRequest();
 	$json=$sr->get_order_details($session,$args);
 	$json=json_decode($json);
 	return(self::get_order_details($json));
 }


/*
 * Adds the delivery_costs to the order
 */
 public static function AddDeliveryCosts($session="",$delivery_costs=array())
 {
 	$sr=new SleekShopRequest();
 	$json=$sr->add_delivery_costs($session,$delivery_costs);
 }


/*
 * Checks out the order
 */
 public static function Checkout($session="")
 {
 	$sr=new SleekShopRequest();
 	$json=$sr->checkout($session);
 	$json=json_decode($json);
 	$result=array();
    $result["status"]=(string)$json->status;
    $result["id_order"]=(int)$json->id_order;
    $result["session"]=(string)$json->session;
    $result["message"]=(string)$json->message;
    $result["param"]=(string)$json->param;
    return($result);
 }

/*
 * Initiates the Payment
 */
 public static function DoPayment($id_order=0,$args=array())
 {
 	$sr=new SleekShopRequest();
 	$json=$sr->do_payment($id_order,$args);
 	$json=json_decode($json);
 	$result=array();
 	$result["method"]=(string)$json->method;
 	$result["status"]=(string)$json->status;
 	$result["redirect"]=html_entity_decode((string)($json->redirect));
  $result["token"]=($json->token);
 	return($result);
 }

 /*
  * Searching the orders
  */
  public static function SearchOrders($constraint=array(),$left_limit=0,$right_limit=0,$order_columns=array(),$order_type="ASC",$language=DEFAULT_LANGUAGE)
  {
  	$sr=new SleekShopRequest();
  	$json=$sr->search_orders($constraint,$left_limit,$right_limit,$order_columns,$order_type,$language);
    $json=json_decode($json);
    $result=array();
    foreach($json->result as $order)
    {
      $piece=array();
      $piece["id"]=(int)$order->id;
      $piece["username"]=(string)$order->username;
      $piece["order_payment_method"]=(string)$order->payment_method;
      $piece["order_delivery_method"]=(string)$order->delivery_method;
      $piece["order_payment_state"]=(string)$order->payment_state->name;
      $piece["order_delivery_state"]=(string)$order->delivery_state->name;
      $piece["order_state"]=(string)$order->order_state;
      $piece["order_number"]=(string)$order->order_number;
      $piece["creation_date"]=(string)$order->creation_date;
      $piece["delivery_companyname"]=(string)$order->delivery_companyname;
      $piece["delivery_department"]=(string)$order->delivery_department;
      $piece["delivery_salutation"]=(string)$order->order_delivery_salutation;
      $piece["delivery_firstname"]=(string)$order->order_delivery_firstname;
      $piece["delivery_lastname"]=(string)$order->order_delivery_lastname;
      $piece["delivery_street"]=(string)$order->order_delivery_street;
      $piece["delivery_number"]=(string)$order->order_delivery_number;
      $piece["delivery_zip"]=(string)$order->order_delivery_zip;
      $piece["delivery_state"]=(string)$order->order_delivery_state;
      $piece["delivery_city"]=(string)$order->order_delivery_city;
      $piece["delivery_country"]=(string)$order->order_delivery_country;
      $piece["invoice_companyname"]=(string)$order->order_invoice_companyname;
      $piece["invoice_department"]=(string)$order->order_invoice_department;
      $piece["invoice_salutation"]=(string)$order->order_invoice_salutation;
      $piece["invoice_firstname"]=(string)$order->order_invoice_firstname;
      $piece["invoice_lastname"]=(string)$order->order_invoice_lastname;
      $piece["invoice_street"]=(string)$order->order_invoice_street;
      $piece["invoice_number"]=(string)$order->order_invoice_number;
      $piece["invoice_zip"]=(string)$order->order_invoice_zip;
      $piece["invoice_state"]=(string)$order->order_invoice_state;
      $piece["invoice_city"]=(string)$order->order_invoice_city;
      $piece["invoice_country"]=(string)$order->order_invoice_country;
      $piece["note"]=(string)$order->order_note;
      $piece["email"]=(string)$order->order_email;
      $piece["cart"]=CartCtl::get_cart_array($order->cart);
      $result[]=$piece;
    }
  	return($result);
  }


}

?>
