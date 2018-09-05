<?php include('plugin/page_declaration.php');?>
	<title>Change permissions</title>
</head>
<body>
  <?php
  $client_id = $_SESSION['client_id'];
  $permission = $_POST['permission'];
  $_SESSION['client_public_access'] = $_POST['permission'];
  require($_SESSION['includes'].'PAT_client.php');
  $mysql = (' UPDATE loginDB.clients
              SET client_public_access = '.$permission.'
              WHERE client_id = '.$client_id);
echo ('<p>'. $mysql.' </p>');
mysqli_query($conn, $mysql);
if (mysqli_query($conn, $mysql))
{
  echo('<p>happned</p>');
}
else
{
  echo('<p>Not happened</p>');
}
  ?>

</body>
</html>
