
<!-- Returns a variable $braintree_subscription_status

  Braintree_Subscription::ACTIVE,
  Braintree_Subscription::CANCELED,
  Braintree_Subscription::EXPIRED,
  Braintree_Subscription::PAST_DUE,
  Braintree_Subscription::PENDING
  or if no subscription is found...
  NULL
-->
<!-- //<?php
  //if (!$_SESSION['braintree_subscription_status'])
  //{?> -->
    <!--Braintree script to include-->
    <?php
    if(file_exists('braintree_setup.php'))
    {
      require_once 'braintree_setup.php';

    }
    else
    {
      require_once '../braintree_setup.php';

    }?>
    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
    <?php
      //See if pat tester has a braintree subscription Number
      $user_id = $_SESSION['user_id'];
      //Create connection
      require($_SESSION['includes'].'PAT_tester.php');
      $mysql =("
        SELECT braintree_subscription_id
        FROM loginDB.pat_testers
        WHERE user_id = $user_id");
      if($result = mysqli_query($conn, $mysql))
      {
        $row = mysqli_fetch_array($result);
        $braintree_subscription_id = $row['braintree_subscription_id'];

        if ($braintree_subscription_id)
        {
          $subscriptionObject = Braintree_Subscription::find($braintree_subscription_id);
          $braintree_subscription_status = $subscriptionObject->status;
        }
        else
        {
          $braintree_subscription_status = "NULL";
        }

      }
      else
      {
        $braintree_subscription_status = "NULL";
        //echo('<p>You aint nuttin but a hound dawg</p>');
      }
      //This if clause should enable free accounts
      if($_SESSION['email_address'] == 'peter.craine@me.com')
      {
        $_SESSION['braintree_subscription_status'] ="Active";
      }
      else
      {
        $_SESSION['braintree_subscription_status']=$braintree_subscription_status;
      }
  //}
  ?>
