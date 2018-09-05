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
  if($_SESSION['isloggedin'] = 'true')
  {
    require($_SESSION['includes'].'PAT_tester.php');
    $user_id = $_SESSION['user_id'];
  }
  ?>
  <?php
  $mysql = ("
    SELECT *
    FROM loginDB.pat_testers
    WHERE user_id = $user_id");
  $result = mysqli_query($conn, $mysql);
  if (mysqli_query($conn, $mysql))
  {
    $row = mysqli_fetch_array($result);
    echo('<form target="_parent" action="/pattester_details_submited.php" method="post">');
    echo('  <table style="width:75%"; border="0px";>');
    echo('    <tr>');
    echo('      <th></th>');
    echo('      <th>My Details</th>');
    echo('    </tr>');
    echo('    <tr>');
    echo('      <td><p><b>My Name</b></p></td>');
    echo('      <td><input type="text" name="user_name" size="25" value="'.$row['user_name'].'" placeholder="'.$row['user_name'].'"></input></td>');
    echo('     </tr>');
    echo('    <tr>');
    echo('    <tr>');
    echo('      <td><p><b>Business Name</b></p></td>');
    echo('      <td><input type="text" name="business_name" size="25" value="'.$row['business_name'].'" placeholder="'.$row['business_name'].'"></input></td>');
    echo('     </tr>');
    echo('      <td><p><b>Email Address</b></p></td>');
    echo('      <td><input type="text" name="email_address" size="25"  value="'.$row['email_address'].'"</input></td>');
    echo('    </tr>');
    echo('    <tr>');
    echo('      <td><p><b>Telephone</b></p></td>');
    echo('      <td><input type="text" name="telephone" size="25"  value="'.$row['telephone'].'"</input></td>');
    echo('    </tr>');
    echo('		<tr>');
    echo('		<td></td>');
    echo('    <td><p><input type="submit" id="submit_cell" value="Submit"></input></p></td>');
    echo('		</tr>');
    echo('  </table>');
    echo('</form>');
    echo('<a href="password_form.php">Change Password</a>');
    //if ($_SESSION['braintree_subscription_status'] == "Active")
    //{
        //echo('<form target="_parent" action="/delete_subscription.php" method="post">');
        //echo('<input type="submit" id="submit" value="Delete Subscription"></input></th>');

        //echo('</form>');
  //  }
    //else
    //{
    //  echo('<p>Upgrade for the ability to add and update records:-)</p>');
    //  echo('<p><form target="_parent" action="../upgrade.php" method="post">'.
          //'<input type="submit" name="submit" value="Upgrade" id="submitlong"/>'.
      //  '</form>');
  //}
  }
  else
  {
     echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
  }
  ?>
</body>
</html>
