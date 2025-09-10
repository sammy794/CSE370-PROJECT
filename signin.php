<?php
session_start();
error_reporting(0);

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

    if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name=$_POST['username'];
		$pass=$_POST['password'];
		
		$sql="select * from user where binary username='".$name."' AND binary password='".$pass."' ";
		
		$result=mysqli_query($data,$sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['user_id'] = $row['id']; 

		
		
		if($row["employer_flag"]==1)
        {
			$_SESSION['username']=$name;
            $_SESSION['employer_flag'] = $row['employer_flag']; 
			$_SESSION['user_id'] = $row['id'];  

			header("location:employerhome.php");
			exit;
		}
		elseif($row["job_seeker_flag"]==1)
		{
			$_SESSION['username']=$name;
			$_SESSION['job_seeker_flag'] = $row['job_seeker_flag'];
			$_SESSION['user_id'] = $row['id'];  

			header("location:job_seekerhome.php");
			exit;
		}
		elseif($row["admin_flag"]==1)
		{
			$_SESSION['username']=$name;
			$_SESSION['admin_flag'] = $row['admin_flag'];
			$_SESSION['user_id'] = $row['id'];  

			header("location:adminhome.php");
			exit;
		}
		else
		{

			$mess="username or password do not match";
			
			$_SESSION['loginMessage']=$mess;
			
			header("location:index.php");
			exit();
		}
	}
	
?>