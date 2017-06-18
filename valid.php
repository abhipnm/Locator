<?php
	
	 $con=mysqli_connect("mysql.hostinger.in","u763274792_abhi","Rajat1","u763274792_dtest");
	
		if(!$con)
		{
			echo "not connected";
		}
	
		if(!mysqli_select_db($con,'dtest'))
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
		header("Location:Home.html");
	}

?>