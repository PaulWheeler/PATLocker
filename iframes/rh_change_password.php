
<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
  <?php
  if ($_SESSION['isloggedin'] == 'true' or $_SESSION['clientIsloggedin']=='true')
  {
    //Pat tester logged in
    if($_SESSION['isloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_tester.php');
      $user = "PAT_Tester";
      $DBName = "loginDB.pat_testers";
      $id = $_SESSION['user_id'];
      $idColumnName = "user_id";
      $passwordColumnName ="password";
    }
    //Client logged in
    elseif($_SESSION['clientIsloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_client.php');
      $user ="PAT_Client";
      $DBName = "loginDB.clients";
      $id = $_SESSION['client_id'];
      $idColumnName = "client_id";
      $passwordColumnName ="client_password";
    }

    if ($_POST['newPassword'] == $_POST['passwordCheck'])
    {
      //encrypt old password cleantext
      //encryption requires that $cleantext be declared first.
      //initialises a value $encryptedtext
      $cleantext = $_POST['oldPassword'];
      require($_SESSION['includes'].'encrypt.php');
      $oldPassword = $encryptedtext;

      //encrypt new password cleantext
      //encryption requires that $cleantext be declared first.
      //initialises a value $encryptedtext
      $cleantext = $_POST['newPassword'];
      require($_SESSION['includes'].'encrypt.php');
      $newPassword = $encryptedtext;

      //This mysql should work for both types of client
      $checkMySQL =('SELECT '.$passwordColumnName.'
                    FROM '.$DBName.'
                    WHERE '.$idColumnName.' = '.$id);
      $result = mysqli_query($conn, $checkMySQL);

      while($row = mysqli_fetch_array($result))
      {
        $database_password = $row[$passwordColumnName];
      }

       if ($oldPassword == $database_password)
       {
        //Only in this condition can any database updates be made
        $updateMySQL = 	('UPDATE '.$DBName.'
                          SET '.$passwordColumnName.'= \''.$newPassword.'\'
                          WHERE '.$idColumnName.' = '.$id) ;
        mysqli_query($conn, $updateMySQL);

        if (mysqli_query($conn, $updateMySQL))
        {
          echo('<strong><br>New password has been saved. Thank you.</strong>');
        }
        else
        {
          echo('<strong><br>Password Not saved</strong>');
          echo $updateMySQL;
        }
      }
      else
      {
        echo('<strong>Sorry, your old password doesn\'t match the password we have on file.
              Please try again<strong>');
      }
     }
     else
     {
       echo('<strong>Sorry, the new password did not match the check. Please try again....</strong>');
     }
  }
  ?>
</body>
</html>
