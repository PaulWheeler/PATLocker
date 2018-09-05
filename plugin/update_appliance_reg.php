<?php session_start();
$tool_type = $_POST['tool_type'];
$environment =$_POST['environment'];
$class = $_POST['class'];
$fuse_size = $_POST['fuse_size'];
$combined_inspection_frequency = $_POST['combined_inspection_frequency'];
$relevent_info = $_POST['relevent_info'];
$location = $_POST['location'];
$id_number = $_POST['id_number'];

if ($_SESSION['isloggedin'] == 'true' or $_SESSION['clientIsloggedin']=='true')
{
  echo('<p>Hello from initial if</p>');
  if($_SESSION['isloggedin'] == 'true')
  {
    echo('<p>Hello from first inner if</p>');
    require($_SESSION['includes'].'PAT_tester.php');
  }
  elseif($_SESSION['clientIsloggedin'] == 'true')
  {
    echo('<p>Hello from elsif</p>');
    require($_SESSION['includes'].'PAT_client.php');
  }

  $mysql=('
          UPDATE patlocker.tool_register
          SET tool_type = \''.$tool_type.'\',
              environment = \''.$environment.'\',
              class = \''.$class.'\',
              fuse_size = \''.$fuse_size.'\',
              combined_inspection_frequency = \''.$combined_inspection_frequency.'\',
              relevent_info = \''.$relevent_info.'\',
              location = \''.$location.'\'
          WHERE id_number = \''.$id_number.'\'
          ');
          echo($mysql);
  mysqli_query($conn, $mysql);
  echo('<p>MySQL submitted</p>');
  $_SESSION['unique_tool_id'] = $id_number;
  header("Location: ../iframes/rh_tool_description.php");
  //require('../iframes/rh_tool_description.php');

}
else
{
  echo('Sorry, you need to login to make any changes');
}
?>
