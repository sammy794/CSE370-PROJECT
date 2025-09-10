<?php
session_start();

$employer_id = $_SESSION['user_id'];
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_job']))
{
	$title=$_POST['title'];
	$requirement=$_POST['requirement'];
	
	$sql="INSERT INTO job(user_id,title,requirement) VALUES ('$employer_id','$title','$requirement')";
	
	$result=mysqli_query($data,$sql);
	if($result)
	{
		echo "<script type='text/javascript'>
		alert('New Job Added Successfully!');
		 </script>";
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add Jobs</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/postjob.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">Add New Jobs</div>
		   <div class="logout">
		       <a href="logout.php">Logout</a>
		   </div>
        </section>
		<aside>
		    <ul>
			    <li>
				    <a href="employerhome.php">Home</a>
				</li>
				<li>
				    <a href="employerprofile.php">My Profile</a>
				</li>
				<li>
				    <a href="modify_JS_Pro.php">Job Seeker Profile</a>
				</li>
				<li>
				    <a href="viewmessage.php">View Messages</a>
				</li>
				<li>
				    <a href="postjob.php">Post Job</a>
				</li>
			</ul>
		</aside>
		<div class="content2">
		   <div>
		      <form class="job-form" action="#" method="POST">
			    <div class="form-group">
				   <label>Title</label>
				   <input type="text" name="title">
				</div>
				
				<div class="form-group">
				   <label>Requirement</label>
				   <textarea name="requirement" rows="5" cols="50" placeholder="Enter job requirements..."></textarea>
				</div>
				
                <div class="form-group">				   
				   <input type="submit" name="add_job" value="Add Job" class="btn btn-success">
				</div>

			  </form>
		   </div>
		</div>
		
</body>
</html>