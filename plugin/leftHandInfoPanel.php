<?php

//Left hand area
	echo('<div id="left_pannel">');
	echo('<p>Hello '. $_SESSION['user_name'] . '</p>');
	echo('<p>You have '. $_SESSION['number_of_clients'] . ' clients</p>');
	echo('<p>You have a total of '. $_SESSION['number_of_tools'] .' appliances in your care</p>');
	echo '<p>Thank you for logging in </p>';

//echo('<p>User_id = '.$_SESSION['user_id'].'</p>');


	echo('</div>');
//end of left hand area

?>
