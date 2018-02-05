<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();

$CurrentUser='';
$isAdmin=false;

if(isset($_SESSION['user']))
	$CurrentUser = $_SESSION['user'];

if(isset($_SESSION['user']))
	$isAdmin = $_SESSION['is_admin'];

$users = $conn->query("select * from users");

echo "<h1>User Report</h1>";
echo "<h2>All users</h2>";

foreach ($users as $user){
	$id = $user["id"];
	$name = $user["name"];
	$is_admin = $user["is_admin"];
	echo "$id - $name - ";
	
	if ($is_admin) {
		echo "Administrator";
	} else {
		echo "User";
	}

	echo "<br />";
 	}

	echo "<h1>Current user</h1>";
     
	    $userProfileName= $CurrentUser." - ";
      

		if ($isAdmin) {

			$userProfileName=$userProfileName."Administrator";
		} else {

			$userProfileName=$userProfileName."User";
		}

	    if($CurrentUser!='')
	    echo $userProfileName;

	    echo "<br/>New User Login <a href='login.php'>login</a> ";
    
?>