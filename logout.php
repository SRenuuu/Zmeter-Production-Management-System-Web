<?php

//session start
session_start();

//set empty values to sesstion array
$_SESSION=array();

//delete cokkies for session
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-86400, '/');
}

//stop session
session_destroy();

header('Location:login.php?logout=yes');


?>