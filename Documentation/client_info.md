# Page
iframes/client_info.php

## Takes
* $_SESSION['isloggedin']
or
* $_SESSION['clientIsloggedin']
* $_SESSION['includes']
* $_SESSION['client_id']

## Makes
$_SESSION['business_name']
$_SESSION['client_email']
$_SESSION['number_of_clients_tools']
$_SESSION['next_pat_due']
$_SESSION['number_of_tools'] ?? Is this a reproduction of the above? It is. Why do we need it??

## Uses
*  ?/PAT_Tester_user.php
* loginDB.clients
* patlocker.tool_register
* patlocker.due_dates
## Form envokes
