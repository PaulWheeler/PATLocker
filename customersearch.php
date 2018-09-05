<?php include('plugin/page_declaration.php');?>
	<title>Customer Search</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->
      <div id="pannels_holder">
        <!--Left Hand Client information area -->
        <div id="left_pannel">
          <p><b>Client Information</b><p>
          <?php
            echo('<p style="text-align:left;"><b>Name</b><br>');
            echo($_SESSION['client_name'].'</p>');
            echo('<p style="text-align:left;"><b>Email Address</b><br>');
            echo($_SESSION['client_email'].'</p>');
            echo('<p style="text-align:left;"><b>Number of tools in register</b><br>');
            echo('<p>'. $_SESSION['number_of_clients_tools'] .'</p>');
            echo('<p style="text-align:left;"><b>Next test due:</b><br>');
            echo($_SESSION['next_pat_due'] .'</p>');
            echo('</p>');
          ?>
        </div>
        <!--End of Left Hand client information area -->

        <!-- Client_area_spacer -->
        <div id="pannel_spacer"></div>
        <!-- End of client_area_spacer-->

        <!--Right Hand Area-->
        <div id="right_pannel">
          <p><b>Find a PAT record</b></p>
          <form action="customersearched.php" method="post">
            <pform>
              <div style="width:155px; float:left;">Please enter the PAT I.D. number</div>
              <input type="text" name="PAT_ID_search" />
				  		<input type="hidden" name="client_id" value="1"/>
              <br><br><input type="submit" value="Submit" id="submit"/>
            </pform>
          </form>
        </div>
        <!--End of Right Hand area -->
      </div>
		<?php include('pagefooter.php'); ?>
	</div>
</body>
</html>
