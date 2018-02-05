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
unset($_SESSION['is_admin']);
unset($_SESSION['user']);

?>
<form action="" method="post">
<table width="50%" border="0">
<tr>
<td><h3>Admin Log In</h3></td>
</tr>
<tr>
<td><input type="text" name="username" required ></td>
</tr>
<tr>
<td><input type="password" name="password" required></td>
</tr>
</table>
<input type="submit" value="Log In" name="s">
</form>
<?php

if($_POST){

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$result =  $conn->query("select * from users where username =
	'$user' and password = '$pass'");
  
    
	if($result->num_rows>0){
      $row=mysqli_fetch_assoc($result);
       
       if($row['is_admin']==1)
		 $_SESSION['is_admin'] =true;
	   else
         $_SESSION['is_admin'] =false;

		$_SESSION['user'] = $user;
		echo "Logged in as $user ";
		echo "Users List <a href='user.php'>Users</a> ";
     
	}else{

		$_SESSION['user'] = NULL;
		echo 'Invalid login or password';
	}

}

?>