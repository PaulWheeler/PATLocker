<?php include('plugin/page_declaration.php');?>
	<title>Select client</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
	?>
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
					<!--Left hand area-->
					<div id="left_pannel">
						<!--include('plugin/leftHandInfoPanel.php');-->
						<iframe id="left_iframe" name="left_iframe" src="iframes/selectclient_lh.php"></iframe>
					</div>
					<!--end of left hand area-->

					<!--spacer-->
					<div id="pannel_spacer"></div>
					<!--end of space-->

					<!--Right hand area-->
					<div id="right_pannel">
						<iframe id="left_iframe" name="left_iframe" src="iframes/selectclient_rh.php"></iframe>
					</div>
					<!--End of right Hand area-->
				<!--</div>-->
				<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
