<?php
	
	
	$con = mysqli_connect("localhost","root","Rajat1");
	
		if(!$con)
		{
			echo "not connected";
		}
	
		if(!mysqli_select_db($con,'dbtest'))
		{
			echo "data base not connected";
		}else
		{
			echo "Connected";
		}


		$username = $_POST['username'];
		$password = $_POST['password'];


		$query="SELECT * FROM users WHERE username='$username' and passwd='$password'";

		
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
			$row=mysqli_fetch_row($result);
			$sname=$row[0];
			session_start();
			$_SESSION['username']=$username;
			$cookie_name = "user";
			$cookie_value = $username;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			$_SESSION['Status']="Session Status: Login Success!!!";
			header("location:index1.html");
		}
		else 
		{	
			session_start();
			if (isset($_SESSION['SName'])){
			unset($_SESSION['SName']);
		    }
		$_SESSION['Status']="Session Expired!!!";
		echo "<h2>Login Failed!!!</h2>";
		//header("Location:index1.html");
	}

/*
	$row = mysqli_fetch_array($result);
if ($row['username']==$myusername && $row['password']==$mypassword) {
   echo "  Login success !!!! welcome  ".$row['username'];
   header('Location: index1.html');
exit;
}else{
   echo "  Login failed...";
   header('Location: login.html');
}

*/

?>