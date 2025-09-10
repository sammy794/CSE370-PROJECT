<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
if($_GET['job_seeker_id'])
{
	$user_id=$_GET['job_seeker_id'];
	$sql="DELETE FROM user WHERE id='$user_id'";
	 
	$result=mysqli_query($data,$sql);
	
	if($result)
	{ 
        $_SESSION['message']='Successfully Deleted';
        header("location:modify_JS_Pro.php");
	}
}

?>