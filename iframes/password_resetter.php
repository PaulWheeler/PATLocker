<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>

<div class="center">
    <?php
      $email_address = $_POST['email_address'];

        //Finds the /includes/ directory outside the document tree
  		    $docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
    		  if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
    		      $home = substr( $docroot, 0, stripos( $docroot, "/public_html" ));
    		       $_SESSION['includes'] = $home.'/includes/';

      //Setup db access with $conn
      require($_SESSION['includes'].'PAT_tester.php');
		if($_POST["user_type"] == "PAT_Tester")
		{

      	$mysql = ("
			SELECT user_id
			FROM loginDB.pat_testers
			WHERE email_address = \"$email_address\"");

		}
		if($_POST["user_type"] == "client")
		{

			$mysql = ("
				SELECT client_id
				FROM loginDB.clients
				WHERE client_email = \"$email_address\"");

		}
      $result = mysqli_query($conn, $mysql);

      $_SESSION['num_rows'] = mysqli_num_rows($result);

      //Email not in DB case
      if ($_SESSION['num_rows'] != 1)
      {
        $body = '
        <br> Email: '.$email_address.'
        <br>
        <p>Someone sent a password reset using this email address.
        We do not have your address in our DB. So you can\'t be a member</p>';
      }
      //End of Email not in DB case

      //Email IS in DB case
      else
      {
        while($row = mysqli_fetch_array($result))
        {
          if($_POST["user_type"] == "PAT_Tester")
      		{
            $user_id = $row['user_id'];
            //Delete any existing token belonging to the user
            $deleteExistingToken = ('
              UPDATE loginDB.pat_testers
              SET reset_token = \'NULL\', reset_timestamp = NULL
              WHERE user_id =  '.$user_id);

          }
          if($_POST["user_type"] == "client")
      		{
            $client_id = $row['client_id'];
            //Delete any existing token belonging to the user
            $deleteExistingToken = ('
              UPDATE loginDB.clients
              SET reset_token = \'NULL\', reset_timestamp = NULL
              WHERE client_id =  '.$client_id);

          }
          mysqli_query($conn, $deleteExistingToken);

          //Create new reset token
          $reset_token = bin2hex(random_bytes(64));
          $reset_timestamp=time();
          if($_POST["user_type"] == "PAT_Tester")
      		{
          $mysql = ('
            UPDATE loginDB.pat_testers
            SET reset_token = \''.$reset_token.'\', reset_timestamp = \''.$reset_timestamp.'\'
            WHERE user_id =  '.$user_id);

          }
          if($_POST["user_type"] == "client")
          {
          $mysql = ('
            UPDATE loginDB.clients
            SET reset_token = \''.$reset_token.'\', reset_timestamp = \''.$reset_timestamp.'\'
            WHERE client_id =  '.$client_id);
          }

          mysqli_query($conn, $mysql);
        }
        $url = "https://patlocker.co.uk/password_activate.php?token=$reset_token";
        $body = '
        <p>Thank you: You have requested a password reset. If true click Here.
        <a href="'.$url.'">reset</a></p>
        <p>Or paste this one time URL into your browser address bar.<br>
        '.$url.'</p>
        <p>The address will expire within 15 minutes of being sent.</p>

        ';

      }
      //End of Email IS in DB case

      //Send email regardless of whether in DB or not
      if (!filter_var($email_address, FILTER_VALIDATE_EMAIL) === false)
        {
          //email stuff
          require_once('../plugin/PHPMailer/class.phpmailer.php');
          $mail = new PHPMailer(); // defaults to using php "mail()"
          $mail->AddReplyTo("paul@patlocker.co.uk","Paul Wheeler");
          $mail->SetFrom('support@patlocker.co.uk', 'PAT Locker');
          $mail->AddAddress($email_address);
          $mail->Subject    = "PATLocker reset Password ";
          $mail->MsgHTML($body);
          if(!$mail->Send())
          {
            echo "Mailer Error: " . $mail->ErrorInfo;
          }
          else
          {
            echo "<p>Message sent!</p> <p>Please check your email inbox or spam box for the activation link</p>";
          }
        }
        //end of email stuff
        else
        {
          $user_type=$_POST['user_type'];
          ?>
          <div class="center">
            <div id="toptab"><b>Please enter your email address:</b></div>
              <?php echo("$email is not a valid email address");?>
            <form action="password_resetter.php" target="left_iframe" method="post">
              <input type="hidden" name="arrived_from_login" value="true"></input>
              <br><br>
                <input type="text" name="email_address"/>
                <br><br>
                <input type="hidden" name="user_type" value="<?php echo($user_type);?>"></input>
                <input type="submit" value="Send new password" id="submit"/>
              </form>
            </div>
            <?php
        }
      //End of Send email regardless of whether in DB or not
    ?>
   </div>
</body>
</html>
