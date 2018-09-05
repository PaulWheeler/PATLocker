<?php include('plugin/page_declaration.php');?>
	<title>Register</title>
</head>

<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->
	<!--Spacer -->
	<div style="width:236px; height:500px; float:left;"> </div>
	<!-- end of spacer -->

		<!--Right hand area-->
		<div id="right_pannel">
				<p><b>Please enter your details</b></p>
				<!-- <form id="formplop" action="results.php" method="post" onsubmit="return checkForm(this);"> -->
					<form id="formplop" action="terms.php" method="post" onsubmit="return checkForm(this);">
						<br>
						<div style="width:155px; float:left;">Full Name:</div>
						<input type="text" name="user_name" />
						<br><br>
						<div style="width:155px; float:left;">eMail Address:</div>
						<input type="text" name="email_address" />
						<br><br>
						<div style="width:155px; float:left;">Password</div>
						<input required title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"
						  type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" onchange="
						  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
						  if(this.checkValidity()) form.passwordcheck.pattern = this.value;
						">
						<br><br>
						<div style="width:155px; float:left;">Repeat Password</div>
						<input title="Please enter the same Password as above" type="password"
						  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="passwordcheck" onchange="
						  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
						">
						<br><br>
						<div style="width:155px; float:left;">Business Name:</div>
						<input type="text" name="business_name" />
						<br><br>
						<div style="width:155px; float:left;">Telephone Number:</div>
						<input type="text" name="telephone" />
						<br><br><input type="submit" value="Submit" id="submit">

				</form>
			</div>
			<!-- End of right hand pannel-->
			<!--Spacer -->
			<div style="width:236px; height:500px; float:left;"> </div>
			<!-- end of spacer -->

		<?php include('plugin/footer.php');?>
	</div>
</body>
</html>
