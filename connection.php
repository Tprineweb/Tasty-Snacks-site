<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tastysnacks";

$user = $_GET["user"];
$pass= $_GET["pass"];

if($user == "" || $pass == "")
{
	echo "login failed! One or more fields left blank <br> <a href='login.php'>Retry</a>";
	
}else
{
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$test = "SELECT username, password FROM login WHERE username = '$user' and password = '$pass'";
$result = $conn->query($test);
if ($result->num_rows > 0)
{
$queryString =  $_SERVER['QUERY_STRING'];   
        header("Location:MVC2/view.php?".$queryString);

$conn->close();
}else{
	echo "Incorrect Username or Password <br> <a href='login.php'>Retry</a>";
}
}


?>