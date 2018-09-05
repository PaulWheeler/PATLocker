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
  	<div id="toptab" style="width:100%;"><b>Change Password</b>
  	</div>
  	<form action="rh_change_password.php" target="right_iframe" method="post" onsubmit="return checkForm(this);">
      <strong>Old Password</strong>
      <br>
      <input type="password" name="oldPassword"/>
      <br>
      <strong>New Password</strong>
      <!--First lines of replacement code-->
      <p><strong>Password</strong><br>
      Password must contain at least 6 characters, including UPPER/lowercase and numbers</p>
      <input required title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"
        type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="newPassword" onchange="
        this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
        if(this.checkValidity()) form.passwordcheck.pattern = this.value;
      ">
      <p><strong>Repeat New Password</strong><br>
      Please enter the same Password as above</p>
      <input title="Please enter the same Password as above" type="password"
        required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="passwordCheck" onchange="
        this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
      ">
      <!--LAst lines of replacement code-->
    <!--<br>
      <input type="password" name="newPassword"/>
      <br>
      <strong>Repeat New Password</strong>
      <br>
      <input type="password" name="passwordCheck"/>
      <br>-->
      <br>
      <input type="submit" name="submit" value="Confirm change" id="submit" ></input>
    </form>
</body>
</html>
