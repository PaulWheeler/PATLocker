<?php include('plugin/page_declaration.php');?>
	<title>Tool Register</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
			<!-- left hand area -->
			<div id="left_pannel">
				<iframe id="left_iframe" name="left_iframe" src="iframes/lh_tool_list.php"></iframe>
			</div>
			<!--End of left hand pannel-->
			<!-- Spacer -->
			<div id="pannel_spacer"></div>
			<!--End of spacer-->
			<!--right hand pannel-->
			<div id="right_pannel">
				<iframe id="right_iframe" name="right_iframe"></iframe>
			</div>
			<!--End of right hand pannel-->
		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
