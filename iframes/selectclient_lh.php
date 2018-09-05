<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
	<!-- Insert code here -->
  <?php
    if($_SESSION['clientIsloggedin'] == 'true' or $_SESSION['isloggedin'] == 'true' )
	   {

        echo('  <h1 class="center">Hello <strong>'. $_SESSION['user_name'] . '</strong></h1>');
        echo('  <h2 class="center">You have <strong>'. $_SESSION['number_of_clients'] . '</strong> clients</h2>');
        echo('  <h2 class="center">You have a total of <strong>'. $_SESSION['number_of_tools'] .'</strong> appliances in your care</h2>');
        echo('  <h2 class="center">Thank you for logging in </h2>');
        // if ($_SESSION['braintree_subscription_status'] != "NULL")
        // {
        //   include('../plugin/braintree_subscription_status.php');
        //   echo('  <h2 class="center">Your subscription is '.$_SESSION['braintree_subscription_status'].'</h2>');
        // }
        // else
        // {
        //   echo('<h2 class="center">Not a paid member</h2>');
        // }
      }
  ?>
</body>
</html>
