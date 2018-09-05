<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body><?php
  $user_type = $_SESSION['user_type'];
  $_SESSION['user_type'] = '';
  ?>
<div class="center">
  <div id="toptab"><b>Please enter your email address:</b></div>
  <form action="password_resetter.php" target="left_iframe" method="post">
    <input type="hidden" name="arrived_from_login" value="true"></input>
    <br><br>
      <input type="text" name="email_address"/>
      <br><br>
      <input type="hidden" name="user_type" value="<?php echo($user_type);?>"></input>
      <input type="submit" value="Send activation email" id="submit"/>
    </form>
  </div>
</body>
</html>
