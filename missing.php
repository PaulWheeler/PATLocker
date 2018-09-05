
<?php include('plugin/page_declaration.php');?>
<style type="text/css">
	@import url(//fonts.googleapis.com/css?family=Press+Start+2P);
	@import url(https://fonts.googleapis.com/css?family=Cutive+Mono);

	body {
	  font: 16px/20px 'Cutive Mono', serif;
	}

	a {
	  color: #222;
	}

	.wrap {
	  width: 500px;
	  margin: 30px auto;
	  text-align: center;
	}

	.test {
	  margin-top: 10px;
	  text-align: left;
	}
</style>

	<title>404 error</title>

</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<!-- left hand area -->
		<div id="left_pannel">
			<h1>404 page not found error</h1>
			<h1> Oh!!! You shouldn't have come here!!!</h1>
			<p>You had better run for it.......</p>
		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--right hand pannel-->
		<div id="right_pannel">
			<br/><br/>
			<player1>Initiating auto destruct sequence, authorization Picard 4-0-4 Alpha Tango.</player1>

<!--Timer start -->
<script>
function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            start = Date.now() + 1000;
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 4.08,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>

	<br/><br/>

    <div><player1><span id="time"></span> minutes to self destruct!</player1></div>


<!--Timer end -->
		</div>
		<!--End of right hand pannel-->
		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>

</body>
</html>
