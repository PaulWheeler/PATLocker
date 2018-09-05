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
		echo('<div class="MenuButtonActive">Current test</div>');
	  //End of Current button
    //Previous button
    echo('<a href="list_pat_client_records.php"><div class="MenuButton">Previous tests</div></a>');

    //End of Previous button

    //Finds the correct user type
    if($_SESSION['isloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_tester.php');
    }
    elseif($_SESSION['clientIsloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_client.php');
    }
    else
    {
      echo('<p>Cant find any loggin session variables to evaluate</p>');
    }
      $duedateMysql=("
        SELECT due_date
        FROM patlocker.due_dates
        WHERE tool_id_number =". $_SESSION['tool_key']."
        ORDER BY due_date
        ASC
        LIMIT 1");
        $result = mysqli_query($conn, $duedateMysql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 1)
        {
          $item_details_row = mysqli_fetch_array($result);
          $due_date =$item_details_row['due_date'];
        }
        else
        {

        }
      $mysql = ("
        SELECT DISTINCT *
        FROM  patlocker.pat_records
        WHERE tool_id =" . $_SESSION['tool_key']."
        ORDER BY record_id
        DESC
        LIMIT 1");
       	$result = mysqli_query($conn, $mysql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 1)
        {
          $item_details_row = mysqli_fetch_array($result);
          $timestamp = date('l jS F Y', strtotime($item_details_row['timestamp']) );
          $exp_date =  date('l jS F Y', strtotime($due_date) );

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
            if($due_date < time())
            {
              echo('<div id="in_date"><p><strong>Expires on</strong> '.$exp_date.'</p></div>');
            }
            else
            {
              echo('<div id="expired"><p><strong>Expired on</strong> '.$exp_date.'</p></div>');
            }
          }
        }
        else
        {
          echo('<p>There is no PAT Test data available for this appliance yet.</p>');
        }



       ?>
</body>
</html>
