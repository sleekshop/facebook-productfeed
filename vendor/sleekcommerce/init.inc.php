<?php

/*
 * Init - file
 *
 * @ Kaveh Raji <kr@sleekcommerce.com>
 */
 define("ROOTPATH", "");
 define("PROJECTPATH", ROOTPATH . "./");
 define("DEFAULT_LANGUAGE", "de_DE");
 /*
  * Now including some libaries needed
  */
  include(PROJECTPATH . "vendor/sleekcommerce/conf.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/sleekshop_request.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/cart.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/shopobjects.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/categories.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/session.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/user.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/order.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/payment.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/mailing.inc.php");
  include(PROJECTPATH . "vendor/sleekcommerce/mysql.php");


?>
