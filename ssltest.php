<?php include('plugin/page_declaration.php');?>
	<title>SSL test</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			//header('Location: login.php') ;
		}
	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->

				<!--Left hand area-->
				<div id="left_pannel">
          <?php
            if (isset($_SERVER['HTTPS']) )
            {
              echo "<strong>SECURE: This page is being accessed through a secure connection.</strong><br><br>";
            }
            else
            {
              echo "<strong>UNSECURE: This page is being access through an unsecure connection.</strong><br><br>";
            }
						echo('<form action="iframes/rh_showencryption.php" target="right_iframe" method="post">');
						echo('	<strong>Input clean text</strong>');
						echo('	<input type="text" name="cleantext">');
						echo('	<input type="submit" name="submit" value="Confirm change" id="submit" ></input>');
						echo('</form>');
          ?>

				</div>
				<!--end of left hand area-->

				<!--spacer-->
				<div id="pannel_spacer"></div>
				<!--end of space-->

				<!--Right hand area-->
				<div id="right_pannel">
							<iframe id="right_iframe" name="right_iframe"></iframe>
					<?php
					// string hash_hmac ( string $algo , string $data , string $key [, bool $raw_output = false ] )
						?>
				</div>
				<!--end of right hand area-->

			<?php include('plugin/footer.php');?>
			</div>

</body>
</html>
