<?php
  require_once 'braintree-php/lib/Braintree.php';
  //Sand box values
  // Braintree_Configuration::environment('sandbox');
  // Braintree_Configuration::merchantId('*************');
  // Braintree_Configuration::publicKey('***************');
  // Braintree_Configuration::privateKey('*******************************');
  //End of sanbox values

  //Live values
   Braintree_Configuration::environment('production');
   Braintree_Configuration::merchantId('**************');
   Braintree_Configuration::publicKey('******************');
   Braintree_Configuration::privateKey('***************************');
  //End of live values
?>
