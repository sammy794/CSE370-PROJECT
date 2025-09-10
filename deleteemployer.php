<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['employer_id'])
{
	$employer_id=$_GET['employer_id'];
	$sql="DELETE FROM user WHERE id='$employer_id'";
	 
	$result=mysqli_query($data,$sql);
	
	if($result)
	{ 
        $_SESSION['message']='Successfully Deleted';
        header("location:updateemployerPRO.php");
	}
}

?>
