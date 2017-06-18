<?php
 $conn=mysqli_connect("mysql.hostinger.in","u763274792_abhi","Rajat1","u763274792_dtest");
 $db=mysqli_select_db($conn,"dtest");
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
header("Location:index1.html");
?>