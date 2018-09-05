<?php include('plugin/page_declaration.php');?>
	<title>Delete Client</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->

				<!--Left hand area-->
				<div id="left_pannel">
					<iframe id="left_iframe" name="left_iframe" src="iframes/client_info.php"></iframe>
				</div>
				<!--end of left hand area-->

				<!--spacer-->
				<div id="pannel_spacer"></div>
				<!--end of space-->

				<!--Right hand area-->
				<div id="right_pannel">
					<iframe id="right_iframe" name="right_iframe" src="iframes/delete_client_rh.php"></iframe>
				</div>
				<!--end of right hand area-->

			<?php include('plugin/footer.php');?>
			</div>

</body>
</html>
