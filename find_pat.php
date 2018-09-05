<?php include('plugin/page_declaration.php');?>
	<title>Find a PAT record</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->
		<!-- Insert code here -->
    <!--Left Hand Client information area -->
    <div id="left_pannel">
			<iframe id="left_iframe" name="left_iframe" src="iframes/client_info.php"></iframe>
    </div>
    <!--End of Left Hand client information area -->

    <!-- Client_area_spacer -->
    <div id="pannel_spacer"></div>
    <!-- End of client_area_spacer-->

    <!--Right Hand Area-->
    <div id="right_pannel">
      <p><b>Find a PAT record</b></p>
      <form action="found_pat.php" method="post">
        <pform>
          <div style="width:155px; float:left;">Please enter the Appliance ID </div>
          <input type="text" name="PAT_ID_search" />
          <br><br>
					<input type="submit" value="Submit" id="submit">
        </pform>
      </form>
    </div>
    <!--End of Right Hand area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
