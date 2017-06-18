<?php
 $conn=mysqli_connect("localhost","root","Rajat1");
 $db=mysqli_select_db($conn,"dbtest");
if($conn)
{
	echo "connected";
}
else
{
	echo "not connected";
}

$username=$_POST['username'];
$password=$_POST['password'];
$emailid=$_POST['email'];
$sql="INSERT INTO users(username,email,passwd) VALUES('$username','$emailid','$password')";



mysqli_query($conn,$sql);
header('Location:login.html');
?>