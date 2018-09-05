<?php include('plugin/page_declaration.php');?>
	<title>Terms and Conditions</title>
</head>
<body>
	<!--The title and menu start-->
  <?php
	if($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and $_SESSION['client_id'])
	{
			include('plugin/header.php');
	}
	else
	{
		include('plugin/header4button.php');
	}
	?>
	<!--The title and menu end-->

		<!-- Insert code here -->
    <?php
    if($_POST['passwordcheck'] != $_POST['password'])
    				{
    					echo('The password check indicates that you have put in a dodgey password. Please try again!
    					<br><br> <a href="javascript:history.back()"> ↩Back</a>');
    				}
            else
            {
              ?>
              <iframe width="75%" height="600PX" src="https://docs.google.com/document/d/e/2PACX-1vTGgOndAd7B5Lltym93lWVO5Mlelgxs9wGeG1FdQYXVGHlmRTvNFcDJJH7A6YoMCG4ix0Gp0TkZydhC/pub?embedded=true"></iframe>

                <form id="formplop" action="results.php" method="post" onsubmit="return checkForm(this);">
                  <p><input type="checkbox" name="terms_and_conditions" value="true">I have read and understood the terms and conditions</p><br>
                  <input type="hidden" value="<?php echo($_POST['email_address'])?>" name="email_address">
                  <input type="hidden" value="<?php echo($_POST['user_name'])?>" name="user_name">
                  <input type="hidden" value="<?php echo($_POST['password'])?>" name="password">
                  <input type="hidden" value="<?php echo($_POST['business_name'])?>" name="business_name">
                  <input type="hidden" value="<?php echo($_POST['telephone'])?>" name="telephone">
                  <input type="submit" value="Continue" id="submit">
                </form>
            <?php } ?>
		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
