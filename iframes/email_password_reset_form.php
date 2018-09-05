<!-- <?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
<div class="center">
  <div id="toptab"><b>Please enter your email address:</b></div>
  <?php
  $email_address = $_SESSION['email_address']);
  $body = '<br><hr><br> Email: '.$email_address.' <br> Question: Hello? <br>';
  ?>
  <form action="http://patlocker.co.uk/data_receiver.php" method="post">
    <input type="hidden" name="data1" value="true"></input>
    <br><br>
      <input type="text" name="email_address" value="<?php echo($_SESSION['email_address']; ?>"/>
      <br><br>
      <input type="password" name="new_password"/>
      <br><br>
      <input type="submit" value="Send new password" id="submit"/>
    </form>
  </div>
</body>
</html> -->
