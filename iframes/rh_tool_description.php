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
  if($_SESSION['clientIsloggedin'] == 'true' or $_SESSION['isloggedin'] == 'true')
	{
    if($_SESSION['isloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_tester.php');
    }
    elseif($_SESSION['clientIsloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_client.php');
    }
    $client_id = $_SESSION['client_id'];
	  if($_POST['id_number'])
	  {
      $id_number = $_POST['id_number'];

	  }
	  else
    {
      $id_number = $_SESSION['unique_tool_id'];
	  }

    $mysql = ("
      SELECT *
      FROM patlocker.tool_register
      WHERE id_number = $id_number");
    $result = mysqli_query($conn, $mysql);
    if (mysqli_query($conn, $mysql))
    {
      echo('<table style="width:100%"; border="0px";>');
      while($row = mysqli_fetch_array($result))
      {
        $mysql =("
                SELECT business_name, telephone
                FROM loginDB.pat_testers
                WHERE user_id=".$row['pat_tester_id']);
        $tester_result = mysqli_query($conn,$mysql);
        $pat_tester_row = mysqli_fetch_array($tester_result);
// Begining of the top buttons
        //echo('<p>before any forms</p>');

        echo('<form action="../found_pat.php" method="post" base target="_parent">');
        echo('<input type="hidden" name="PAT_ID_search" value = "'.$row['tool_id'].'"/>');
        if($_SESSION['isloggedin'] != 'true')
        {
          echo('  <input type="submit" value="View PAT record" id="submit" style="width:100%" />');
        }
        else
        {
          if($_SESSION['braintree_subscription_status'] == "Active")
          {
            echo('  <input type="submit" value="View PAT record" id="submit" style="width:50%" />');
          }
          else
          {
            echo('  <input type="submit" value="View PAT record" id="submit" style="width:100%" />');
          }
        }
        echo('  </form>');

        if($_SESSION['isloggedin'] == "true" && $_SESSION['braintree_subscription_status'] == "Active")
        {
          echo('  <form action="../add_pat.php" method="post" base target="_parent" style="width:50%";>');
          echo('    <input type="hidden" name="PAT_ID_search" value = "'.$row['tool_id'].'" />');
          echo('    <input type="hidden" name="tool_id" value = "'.$row['tool_id'].'" />');
          if($_SESSION['isloggedin'] == 'true')
          {
            echo('   <input type="submit" value="Add PAT record" id="submit"style="width:50%"/>');
          }
          echo('  </form>');
        }

        $date_added = date('l jS F Y \a\t g:ia', strtotime($row['date_added']) );
        echo('<tr>');
        echo('    <td class="right"><b>Appliance ID Number</b></td>');
        echo('    <td class="right"><p>'.$row['tool_id'].'</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Description</b></td>');
        echo('    <td class="right"><p>'.$row['description'].'</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Location</b></td>');
        echo('    <td class="right"><p>'.$row['location'].'</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Environment</b></td>');
        echo('    <td class="right"><p>'.$row['environment'].'</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Appliance type</b></td>');
        echo('    <td class="right"><p>'.$row['tool_type'].'</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Electrical Class</b></td>');
        if($row['class'] == '4')
        {
          echo('  <td class="right"><p>IEC Lead</p></td>');
        }
        else
        {
          echo('  <td class="right"><p>'.$row['class'].'</p></td>');
        }
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Fuse size</b></td>');
        echo('    <td class="right"><p>'.$row['fuse_size'].' Amp</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Inspection Frequency</b></td>');
        echo('    <td class="right"><p>'.$row['combined_inspection_frequency'].' months</p></td>');
        echo('</tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Info</b></td>');
        echo('    <td class="right"><p>'.$row['relevent_info'].'</p></td>');
        echo('</tr>');
        echo('  <tr>');
        echo('    <td class="right"><b>PAT Tester Business name</b></td>');
        echo('    <td class="right"><p>'.$pat_tester_row['business_name'].'</p></td>');
        echo('  </tr>');
        echo('<tr>');
        echo('    <td class="right"><b>Date added to register</b></td>');
        echo('    <td class="right"><p>'.$date_added.'</p></td>');
        echo('</tr>');
      }
       echo('</table>');
     }
     else
     {
       echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
		 }
  }
  ?>
</body>
</html>
