
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
	//Current button
		echo('<a href="found_pat_current.php"><div class="MenuButton">Current test</div></a>');
	//End of Current button
  //Previous button
    echo('<a href="list_pat_client_records.php"><div class="MenuButtonActive">Previous tests</div></a>');
  //End of Previous button

        require($_SESSION['includes'].'public_user.php');
       	$result = mysqli_query($conn,"
          SELECT *
          FROM  patlocker.pat_records
          WHERE record_id =" . $_POST['pat_record_id']);

  $item_details_row = mysqli_fetch_array($result);
        $timestamp = date('l jS F Y', strtotime($item_details_row['timestamp']) );
         echo('<p><b>Cable check: </b>'.$item_details_row['cable_check'].'</p>');
         echo('<p><b>Appliance check: </b>'.$item_details_row['appliance_check'].'</p>');
         echo('<p><b>Plug Check internal: </b>'.$item_details_row['plug_check_internal'].'</p>');
         echo('<p><b>Plug Check external: </b>'.$item_details_row['plug_check_external'].'</p>');
         echo('<p><b>Fuse Check: </b>'.$item_details_row['fuse_check'].'</p>');
         echo('<p><b>Earth Check: </b>'.$item_details_row['earth_check'].'</p>');
         echo('<p><b>Insulation Check: </b>'.$item_details_row['insulation_check'].'</p>');
         echo('<p><b>Polarity Check: </b>'.$item_details_row['polarity_check'].'</p>');
         echo('<p><b>Ohm Reading: </b>'.$item_details_row['ohm_reading'].'</p>');
         echo('<p><b>Tested on </b>'.$timestamp.'</p>');
         echo('<p><b>Notes: </b>'.$item_details_row['notes'].'</p>');

         if($item_details_row['cable_check'] == 'fail' ||
             $item_details_row['appliance_check'] == 'fail'||
             $item_details_row['plug_check_internal'] == 'fail'||
             $item_details_row['plug_check_external'] == 'fail' ||
             $item_details_row['fuse_check'] == 'fail' ||
             $item_details_row['earth_check'] == 'fail' ||
             $item_details_row['insulation_check'] == 'fail' ||
             $item_details_row['polarity_check'] == 'fail')
         {
           echo('<div id="expired"><p><strong>FALIURE!!!!!!!!</p></div>');
         }
         else
         {
           echo('<div id="in_date"><p><strong>Pass (No longer valid)</strong></p></div>');
         }

      //  else
      //  {
      //    echo('<p>There is no PAT Test data available for this appliance yet.</p>');
      //  }
       ?>
</body>
</html>
