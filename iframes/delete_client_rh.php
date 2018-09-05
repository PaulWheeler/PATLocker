<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
  <div class="center">
	<p><b>Select client to DELETE!</b></p>
	<!--Create connection-->
	<?php
		if($_SESSION['isloggedin'] == 'true')
		{
			require($_SESSION['includes'].'PAT_tester.php');
		}
		//Pass the info to the database
		$pat_tester_id = $_SESSION['user_id'];

		$result = mysqli_query($conn,"
			SELECT *
			FROM loginDB.clients
			WHERE pat_tester_id = $pat_tester_id
			ORDER BY business_name");
		$num_rows = mysqli_num_rows($result);

		if ($num_rows == 0)
		{
			echo "No clients found ";
		}
		else
		{
			while($row = mysqli_fetch_array($result))
			{
				$business_name = $row['business_name'];
				$client_id = $row['client_id'];
				echo('<form action="../confirm_delete.php" target="_parent" method="post">'.
			 		'<input type="hidden" name="client_id" value="'.$client_id.'">'.
						'<input type="submit" name="submit" id="submitlong"'.
							'value="'.$business_name.'"></form>');
			}
		}
    echo('</div>');
	?>
</body>
</html>
