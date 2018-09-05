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
  <form action="../client_toolreg.php" method="post" base target="_parent">
      <!--<input type="hidden" name="PAT_ID_search" value = <?php echo ($row['tool_id']);?> />-->
      <input type="submit" value="Appliance Register" class="MenuButton" style="width:50%" />
  </form>
  <form action="../find_pat.php" method="post" base target="_parent">
      <!--<input type="hidden" name="PAT_ID_search" value = <?php echo ($row['tool_id']);?> />-->
      <input type="submit" value="Find PAT Record" class="MenuButton" style="width:50%" />
  </form>
  <!-- <form action="../add_pat.php" method="post" base target="_parent">
      <input type="hidden" name="tool_id" value = <?php echo ($item_details_row['tool_id']);?> />
      <input type="submit" value="Add PAT Record" class="MenuButton" style="width:33%" />
  </form> -->
  <br><br>
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


      $mysql = ("
              SELECT *
              FROM patlocker.tool_register
              WHERE client_id = ". $_SESSION['client_id']."
              AND tool_id = ". $_SESSION['PAT_ID_search']);

      if($result = mysqli_query($conn, $mysql))
      {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0)
        {

          $item_details_row = mysqli_fetch_array($result);
          $mysql =("
                  SELECT business_name, telephone
                  FROM loginDB.pat_testers
                  WHERE user_id=".$item_details_row['pat_tester_id']);
          $tester_result = mysqli_query($conn,$mysql);
          $pat_tester_row = mysqli_fetch_array($tester_result);



          $_SESSION['tool_key'] = $item_details_row['id_number'];
          $date_added = date('l jS F Y \a\t g:ia', strtotime($item_details_row['date_added']) );
          echo('<table>');
          echo('  <tr>');
          echo('    <td class="right"><b>Appliance ID Number</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['tool_id'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Description</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['description'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Location</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['location'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Environment</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['environment'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Tool Type</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['tool_type'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Electrical Class</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['class'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Fuse size</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['fuse_size'].' Amp</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Inspection Frequency</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['combined_inspection_frequency'].' months</p></td>');
          echo('  </tr>');
          echo( '<tr>');
          echo('    <td class="right"><b>Info</b></td>');
          echo('    <td class="right"><p>'.$item_details_row['relevent_info'].'</p></td>');
          echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>PAT Tester Business name</b></td>');
          echo('    <td class="right"><p>'.$pat_tester_row['business_name'].'</p></td>');
          echo('  </tr>');
          // echo('  <tr>');
          // echo('    <td class="right"><b>PAT Tester Telephone</b></td>');
          // echo('    <td class="right"><p>'.$pat_tester_row['telephone'].'</p></td>');
          // echo('  </tr>');
          echo('  <tr>');
          echo('    <td class="right"><b>Date added to register</b></td>');
          echo('    <td class="right"><p>'.$date_added.'</p></td>');
          echo('  </tr>');
          echo('</table>');
          $_SESSION['combined_inspection_frequency'] = $item_details_row['combined_inspection_frequency'];

          // if($_SESSION['braintree_subscription_status'] == "Active" || $_SESSION['new_account'] == 'true')
          // {
            ?>
            <form action="../add_pat.php" method="post" base target="_parent">
                <input type="hidden" name="tool_id" value = <?php echo ($item_details_row['tool_id']);?> />
                <input type="submit" value="Add PAT Record" class="MenuButton" style="width:100%" />
              </form>
              <br><br>
              <?php
          //}

        }
        else
        {
          $_SESSION['tool_key'] = $item_details_row['id_number'];
          echo('<p>Sorry, item not found in register. Please try again.</p>');
        }
      }
      else
      {
        echo('<p>Sorry. I can\'t find an appliance in the register with that id. Please try again. </p>');
        // echo ('<br>$_SESSION[\'tool_key\'] = '.$_SESSION['tool_key']);
        // echo('<br>$_SESSION[\'client_id\'] = '.$_SESSION['client_id']);
        // echo('<br>$_SESSION[\'PAT_ID_search\']= '.$_SESSION['PAT_ID_search']);
      }
    }
    ?>

</body>
</html>
