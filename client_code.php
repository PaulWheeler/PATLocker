<?php include('plugin/page_declaration.php');?>
	<title>Code for your website</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->


			<!-- Insert code here -->
      <textarea rows="8" cols="70" readonly>
      <?php
			$client_id = $_SESSION['client_id'];
			echo("\n");
        	echo("&lt;form action=\"client_login.php\" method=\"post\"/&gt;\n");
          echo("   &lt;input type=\"hidden\" name=\"client\" value=\"$client_id\"/&gt;\n");
          echo("   &lt;input type=\"text\" name=\"pat_item_search\"/&gt;\n");
          echo("   &lt;input type=\"submit\" value=\"Submit\" id=\"submit\"/&gt;\n");
        	echo("&lt;/form&gt;");
      ?>
    </textarea>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>
