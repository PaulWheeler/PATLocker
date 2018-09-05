<?php include('plugin/page_declaration.php');?>
	<title>Delete</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
	?>
	<?php
	$_SESSION['client_id'] = $_POST['client_id'];
	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->
				<!--Left Hand Client information area -->
				<div id="left_pannel">
					<p><b>Client Information</b><p>
					<?php
						// Create connection
						if($_SESSION['isloggedin'] == 'true')
						{
							require($_SESSION['includes'].'PAT_tester.php');
						}
            $client_id = $_POST['client_id'];
						//Pass the info to the database
            $sql = ("
              DELETE
              FROM loginDB.clients
              WHERE client_id = ". $client_id);
              //echo('<p>Client_ID ='. $sql);
						//close this connection
            if (mysqli_query($conn, $sql))
            {
              echo "Record deleted successfully";
            }
            else
            {
              echo "Error deleting record: " . mysqli_error($conn);
            }
            mysqli_close($conn);
					?>
				</div>
				<!--End of Left Hand client information area -->

				<!-- Client_area_spacer -->
				<div id="pannel_spacer"></div>
				<!-- End of client_area_spacer-->

				<!--Right hand area-->
				<div id="right_pannel">
					<br><a href="selectclient.php"><div class="MenuLong">Select Client</div></a><br>
					<a href="addclient.php"><div class="MenuLong">Add Client</div></a><br>
					<a href="delete_client.php"><div class="MenuLong">Delete Client</div></a><br>
				</div>
				<!--end of right hand area-->
				<!--Client menu-->
				<!--End of client menu area -->
		</div>
		<?php include('pagefooter.php');?>
	</div>
</body>
</html>
