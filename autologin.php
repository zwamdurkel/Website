<?php
//start FileRun session
session_name('FileRunSID');
session_start();
 
$username = "Zwamdurkel";
 
//set logged in username
$_SESSION['FileRun']['username'] = $username;
 
//You are now logged in as $username
 
//Redirect to FileRun:
header('Location: https://riswick.net/fileserver');
?>