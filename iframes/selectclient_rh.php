<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
	<!-- Insert code here -->
  <?php
    if($_SESSION['clientIsloggedin'] == 'true' or $_SESSION['isloggedin'] == 'true' )
	   {
       echo('<div class="center">');
       echo('<p><b>Select client account</b></p>');
       // Create connection
       require($_SESSION['includes'].'PAT_tester.php');
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
				while($row = mysqli_fetch_array($result))
				{
					$client_name = $row['business_name'];
					$client_id = $row['client_id'];
					echo('<form action="../clientaccount.php"  target="_parent" method="post">'.
						 		'<input type="hidden" name="client_id" value="'.$client_id.'">'.
								'<input type="submit" name="submit" id="submitlong"'.
								'value="'.$client_name.'"></form>');
				}
        echo('</div>');
				//end of right hand area
      }
  ?>
</body>
</html>
