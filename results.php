<?php include('plugin/page_declaration.php');?>
	<title>Results</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->
			<?php
					$user_name = $_POST['user_name'];
					$email_address = $_POST['email_address'];
					$password =  $_POST['password'];
					$passwordcheck = $_POST['passwordcheck'];
					$business_name = $_POST['business_name'];
					$telephone = $_POST['telephone'];
				if($_POST["terms_and_conditions"] != "true")
				{
					echo('You cannot proceed unless you agree with the tearms and conditions!
					<br><br> <a href="javascript:history.back()"> ↩Back</a>');
				}
				else
				{
					//Finds the /includes/ directory outside the document tree
					$docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
  					if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
  					$home = substr( $docroot, 0, stripos( $docroot, "/public_html" ));
  					$_SESSION['includes'] = $home.'/includes/';

						//echo ('<p>includes = '.$_SESSION['includes'].'</p>');

						//encryption requires that $cleantext be declared first.
						//initialises a value $encryptedtext
						$cleantext = $_POST['password'];

						require($_SESSION['includes'].'encrypt.php');
						$password=$encryptedtext;
					// Create connection
					require($_SESSION['includes'].'PAT_tester.php');


					//Pass the info to the database
					mysqli_query($conn,"INSERT INTO loginDB.pat_testers(user_name, email_address, password,
					business_name, telephone, subscribed_until)
					VALUES(\"$user_name\", \"$email_address\", \"$password\", \"$business_name\", \"$telephone\", CURDATE())");
					echo('<p>Thank you, your accound details have been accepted and you are now a member. Please </p><a href="login.php">Login</a>.');
				}
			?>
	</div>
</body>
</html>
