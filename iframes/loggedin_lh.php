<?php
//Left hand area
	echo(' <p>Hello '. $_SESSION['user_name'] . '</p>');
	echo(' <p>You have '. $_SESSION['number_of_clients'] . ' clients</p>');
	echo(' <p>You have a total of '. $_SESSION['number_of_tools'] .' appliances in your care</p>');
	echo ' <p>Thank you for logging in </p>';
//end of left hand area
?>
