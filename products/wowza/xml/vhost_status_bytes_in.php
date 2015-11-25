<?php
// page version: 1.1
require("../../../inc/general_conf.inc.php");
if(empty($_SESSION['user'])) {
	header("Location: ". $DOCUMENT_ROOT . "/index.php");
    die("Redirecting to ". $DOCUMENT_ROOT . "/index.php"); 
}

// Create connection
$connect = mysqli_connect($dbHost, $dbUserName, $dbUserPasswd, $dbName);
// Check connection
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}
$output= mysqli_query($connect,"SELECT vhost_bytes_in, vhost_bytes_out FROM wow_vhost_status");
while($row=mysqli_fetch_array($output)){ 
	$VhostBytesIn = $row['vhost_bytes_in'];
	//$VhostBytesOut = $row['vhost_bytes_out'];
}

// source = bytes. convert to bits and convert again to kbps
$bandWithIn = $VhostBytesIn * 8 / 1000;

//convert to 2 numbers behind the dot result:  157.56
$bandwithIncoming = number_format($bandWithIn, 1, '.', '');
		
echo $bandwithIncoming;

//convert to 2 numbers behind the dot result:  157.56
//$bandwith_kbps = number_format($bandwithOut, 2, '.', '');
?>