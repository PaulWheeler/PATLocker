<?php include('plugin/page_declaration.php');?>
	<title>Customer Search</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->
			<?php

				echo('<div id="pannels_holder"><br>');
				//Left hand area
						echo('<div id="left_pannel">');
						echo('</div>');
					//end of left hand area

					//spacer
					echo('<div id="pannel_spacer"></div>');
					//end of spacer

					//Right hand area
					echo('<div id="right_pannel">');
					echo('<iframe id="right_iframe" src="iframes/found_pat_current.php"></iframe>');

					echo('</div>');
					//end of right hand area
			?>


			<!-- End of inserted code -->
		</div>
		<?php include('footer.php'); ?>
</body>
</html>
