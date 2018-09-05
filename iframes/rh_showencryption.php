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
  <?php
  //Finds the /includes/ directory outside the document tree
  $docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
    if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
    $home = substr( $docroot, 0, stripos( $docroot, "/html" ));
    $_SESSION['includes'] = $home.'/includes/';

    //encryption requires that $cleantext be declared first.
    //initialises a value $encryptedtext
    $cleantext = $_POST['cleantext'];
    require($_SESSION['includes'].'encrypt.php');

    echo('<strong>Clean Text</strong><br>');
    echo($cleantext.'<br>');
    echo('<strong>Encrypted Text</strong><br>');
    echo($encryptedtext.'<br>');

  ?>
</body>
</html>
