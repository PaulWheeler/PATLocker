<?php include('plugin/page_declaration.php');?>
	<title>Add a client to your list</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}?>
	<!--The title and menu end-->

			<?php
				if($_SESSION['isloggedin'] != 'true')
				{
					header('Location: login.php') ;
				}
			?>
			<!-- Insert code here -->

			<?php
				if ($_SESSION['isloggedin'] == 'true')
				{
					//Left hand area
					echo('	<div id="left_pannel">');
					echo('		<iframe id="left_iframe" name="left_iframe" src="iframes/selectclient_lh.php"></iframe>');
					echo('	</div>');
					//end of left hand area
					//spacer
					echo('	<div id="pannel_spacer"></div>');
					//end of spacer

					//Right hand area
					echo('	<div id="right_pannel">');
					echo('<div id="toptab" style="width:100%"><ptab>Enter your clients details</ptab></div>');
					//Brintree subscription check
					// $braintree_subscription_status = $_SESSION['braintree_subscription_status'];
					// if($braintree_subscription_status == "Active"|| $_SESSION['new_account'] == 'true')
					// {
						?>
						<form action="addedclient.php" method="post">
							<pform>
								<br><br>
								<div style="width:155px; float:left;">Business Name:</div>
								<input type="text" name="business_name" />
								<br><br>
								<div style="width:155px; float:left;">Contact Name:</div>
								<input type="text" name="contact_name" />
								<br><br>
								<div style="width:155px; float:left;">Tepephone Number:</div>
								<input type="text" name="client_telephone" />
								<br><br>
								<div style="width:155px; float:left;">Clients eMail Address:</div>
								<input type="text" name="client_email" />

								<input type="hidden" name="client_password" value="<?php echo generateRandomString(); ?>">
								<br><br>
								<input type="hidden" name="pat_tester_id" value= <?php echo($_SESSION['user_id']);?> />
								<br>
								<input type="submit" value="Submit" id="submit">
							</pform>
						</form>
						<?php echo('	</div>');
					// }
					// else
					// {
					// 	include('plugin/braintree_not_active.php');
					// }
					//end of right hand area
				}
				else
				{
					echo ('<p>Sorry, I didn\'t recognise that email and password combination.</p>');
					echo('<p>Please click login to try again.</p>');
				}
				include('plugin/footer.php');
 			?>
	</div>
</body>
</html>
