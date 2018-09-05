<?php include('plugin/page_declaration.php');?>
	<title>Contact Us</title>
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
		if($_SESSION['clientIsloggedin'] == 'true')
		{
			include('plugin/header.php');
		}
		else
		{
		include('plugin/header4button.php');
		}
	}
	?>
	<!-- Insert code here -->

	<!-- left hand area -->
	<div id="left_pannel">
		<h1>Contact Us</h1>
		<form action="contact_confirm.php" method="post">
			<p>Enter your name please</p>
			<input type="text" name="name"></input>
			<p>Enter your email address please</p>
			<input type="text" name="email"></input>
			<p>If you would like us to telephone you, please enter your phone number</p>
			<input type="text" name="telephone"></input>
	</div>
	<!--End of left hand pannel-->

	<!-- Spacer -->
	<div id="pannel_spacer"></div>
	<!--End of spacer-->

	<!--right hand pannel-->
	<div id="right_pannel">
		<p>Your message / enquiry</p>
		<textarea style="width:90%;" title="Optional Notes"rows="20" cols="50" name="comments" alt="Notes" required></textarea>
<?php $client_id = $_SESSION['client_id'];?>


	<input type="hidden" name="recipient" value="paul@patlocker.co.uk" / >
	<input type="hidden" name="subject" value="From the feedback form" / >
	<div style="width:100%; height:10px; float:left;"></div>
	<input type="submit" name="submit" value="Send" id="submit" ></input>
</form>
	</div>
	<!--End of right hand pannel-->

	<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
