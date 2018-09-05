<?php include('plugin/page_declaration.php');?>
	<title>Find a PAT record</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<?php
			if ($_SESSION['isloggedin'] == 'true' or $_SESSION['clientIsloggedin']=='true')
			{
				if($_SESSION['isloggedin'] == 'true')
				{
					require($_SESSION['includes'].'PAT_tester.php');
				}
				elseif($_SESSION['clientIsloggedin'] == 'true')
				{
					require($_SESSION['includes'].'PAT_client.php');
				}
				$_SESSION['PAT_ID_search'] = $_POST['PAT_ID_search'];

				//Left hand area
				echo('<div id="left_pannel">');
				echo('	<iframe id="left_iframe" src="iframes/appliance_summary.php"></iframe>');
				echo('</div>');
					//end of left hand area

					//spacer
					echo('<div id="pannel_spacer"></div>');
					//end of spacer

					//Right hand area
					echo('<div id="right_pannel">');
					echo('	<iframe id="right_iframe" src="iframes/found_pat_current.php"></iframe>');
					echo('</div>');
					//end of right hand area
					//unset($_SESSION['PAT_ID_search']);
			}
			else
			{
				echo ('<p>Sorry, I didn\'t recognise that email and password combination.</p>');
				echo('<p>Please click login to try again.</p>');
			}
			?>
			<!-- End of inserted code -->
		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
