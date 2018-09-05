
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
    echo('<div class="MenuButtonActive">Previous tests</div>');
  //End of Previous button
        require($_SESSION['includes'].'public_user.php');
       	$result = mysqli_query($conn,"
          SELECT *
          FROM  patlocker.pat_records
          WHERE tool_id =" . $_SESSION['tool_key']."
          ORDER BY record_id
          DESC");

				while($row = mysqli_fetch_array($result))
				{
          $theDate = date('l jS F Y', strtotime($row['timestamp']) );
          echo('<table style="width:100%"; border="0px";>');
          echo('  <tr>');
          echo('    <form action="previous_pat.php" method="post">');
 					echo('      <input type="hidden" name="pat_record_id" value="'.$row['record_id'].'"></input>');
          echo('      <td>');
 					echo('        <input type="submit" id="submit_cell" name="submit" id="submitlong" value="'. $theDate .'"></input>');
          echo('      </td>');
          echo('    </form>');
          echo('  </tr>');
				}
          echo('</table>');
       ?>
</body>
</html>
