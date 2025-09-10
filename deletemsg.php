<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);




if($_GET['message_id'])
{
	$message_id=$_GET['message_id'];
	$sql="DELETE FROM message WHERE id='$message_id'";
	 
	$result=mysqli_query($data,$sql);
	
	if($result)
	{ 
        $_SESSION['message']='Successfully Deleted';
        header("location:viewmessage.php");
	}
}

?>