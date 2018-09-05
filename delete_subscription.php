<?php include('plugin/page_declaration.php');?>
	<title>Unsubscribe</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<!-- left hand area -->
		<div id="left_pannel">

      <?php
      if ($_SESSION['braintree_subscription_status'] == "Active" && $_POST['pressed'] != "pressed")
        {
          echo('<h1>WARNING!!!</h1>');
          echo('<p>If you unsubscribe, you will no longer be able to create new customers or update any PAT info for existing customers</p>');
          echo('<form id="checkout" method="post" action="delete_subscription.php">');
          echo('  <input type="hidden" name="pressed" value="pressed"></value>');
          echo('  <input type="submit" value="Unsubscribe">');
          echo('</form>');
        }
      if($_POST['pressed'] == "pressed")
      {
        //See if pat tester has a braintree subscription Number
        $user_id = $_SESSION['user_id'];

        //Braintree script to include
        require_once 'braintree_setup.php';
        echo('<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>');
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
        }
        $result = Braintree_Subscription::cancel($braintree_subscription_id);
        //echo('<p>Result = '.$result.'</p>');
        echo('<p>Goodbye. If you ever change your mind, it is easy to re-subscribe:-) </p>');
				echo('<p>Hope you have an awesome day</p>');
				$_SESSION['braintree_subscription_status'] = "Canceled";
      }

      ?>
		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--right hand pannel-->
		<div id="right_pannel">
		</div>
		<!--End of right hand pannel-->
		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
