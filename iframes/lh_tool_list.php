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
    //echo('<p>'$_SESSION['isloggedin'].'</p>')
  	if($_SESSION['isloggedin'] == 'true')
    {
  	  require($_SESSION['includes'].'PAT_tester.php');
   	}
    if($_SESSION['clientIsloggedin'] == 'true')
    {
     	require($_SESSION['includes'].'PAT_client.php');
    }
    $client_id = $_SESSION['client_id'];

    	$mysql = ("
    	  SELECT *
     	  FROM patlocker.tool_register
      	WHERE client_id =$client_id");
    	$result = mysqli_query($conn, $mysql);
    if (mysqli_query($conn, $mysql))
    {
      echo('<table style="width:100%"; border="0px";>');
      echo('<tr>');
      echo('    <th>ID number</th>');
      echo('    <th>Description</th>');
      echo('    <th>Location</th>');
      echo('</tr>');
      while($row = mysqli_fetch_array($result))
      {
        echo('<tr>');
        echo('  <form action="rh_tool_description.php" target="right_iframe" method="post">');
        echo('    <input type="hidden" name="id_number" value="'.$row['id_number'].'"></input>');
        echo('    <td><p><input type="submit" id="submit_cell" value="'.$row['tool_id'].'"></input></p></td>');
        echo('    <td><p>'.$row['description'].'</p></td>');
        echo('    <td><p>'.$row['location'].'</p></td>');
        echo('  </form>');

        //Brintree subscription check or new account check <30 days
        //if($_SESSION['braintree_subscription_status'] == "Active" || $_SESSION['new_account'] == 'true')
        //{
          echo(' <form action="edit_appliance.php" target="right_iframe" method="post">');
          echo('    <input type="hidden" name="id_number" value="'.$row['id_number'].'"></input>');
          echo('    <input type="hidden" name="tool_id" value="'.$row['tool_id'].'"></input>');
          echo('    <td><p class="little"><input type="submit" id="edit_button" value="Edit"></input></p></td>');
          echo('  </form>');
          echo('</tr>');
        //}
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
