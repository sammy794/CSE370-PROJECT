<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['job_id'])
{
	$job_id=$_GET['job_id'];
	$sql="DELETE FROM job WHERE id='$job_id'";
	 
	$result=mysqli_query($data,$sql);
	
	if($result)
	{ 
        $_SESSION['message']='Successfully Deleted';
        header("location:postjob.php");
	}
}

?>
