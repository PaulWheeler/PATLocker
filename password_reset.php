<?php include('plugin/page_declaration.php');?>
	<title>Password Reset</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->

    <!-- Spacer -->
    <div id="pannel_spacer" style="width:25%"></div>
    <!--End of spacer-->

		<!-- left hand area -->
		<div id="left_pannel">
			<?php $_SESSION['user_type'] = $_POST['user_type'];?>
      <iframe id="left_iframe" name="left_iframe" src="iframes/password_reset_form.php"></iframe>
		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer" style="width:25%"></div>
		<!--End of spacer-->

		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
