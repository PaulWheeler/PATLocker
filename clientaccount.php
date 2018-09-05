<?php include('plugin/page_declaration.php');?>
	<title>Clients Account</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
		if ($_POST['client_id'] )
		{
			$_SESSION['client_id'] = $_POST['client_id'];
		}

	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->
		<!-- Insert code here -->

			<!--Left Hand Client information area -->
			<div id="left_pannel">
				<iframe id="left_iframe" name="left_iframe" src="iframes/client_info.php"></iframe>
			</div>
				<!--End of left hand client information area -->

				<!-- Client_area_spacer -->
				<div id="pannel_spacer"></div>
				<!-- End of client_area_spacer-->

				<!--Client menu-->
				<div id="right_pannel">
					<h2>Client Menu</h2>
					<?php include('plugin/client_menu.php');?>
				</div>
				<!--End of client menu area -->
		<?php include('plugin/footer.php');?>
	</div>
</body>
</html>
