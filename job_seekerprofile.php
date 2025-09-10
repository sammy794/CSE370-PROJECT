<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";


$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$name'";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
	
{
	$username=$_POST['username'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$saved_jobs=$_POST['saved_jobs'];
	$skill=$_POST['skill'];
	$experience=$_POST['experience'];
	$resume=$_POST['resume'];
	

	$query="UPDATE user SET username='$username',fname='$fname',lname='$lname',email='$email',password='$password',
	saved_jobs='$saved_jobs',skill='$skill',experience='$experience',resume='$resume' WHERE username='$username'";
	
	$result2=mysqli_query($data,$query);
	if($result2)
	{
		 header('location:job_seekerprofile.php');
	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MyProfile</title>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/jobseeker.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">My Profile</div>
		   <div class="logout">
		       <a href="logout.php">Logout</a>
		   </div>
        </section>
		<aside>
		    <ul>
			    <li>
				    <a href="job_seekerhome.php">Home</a>
				</li>
				 <li>
				    <a href="job_seekerprofile.php">My Profile</a>
				</li>
				 <li>
				    <a href="findjob.php">Find Jobs</a>
				</li>
				 <li>
				    <a href="">Job Application</a>
				</li>
				<li>
				    <a href="contactus.php">ContactUs</a>
				</li>
			</ul>
		</aside>
		<div class="content2">
		  <div class="form-container">
		   <h1 class="form-title"> Update Profile</h1>
		   <form action="#" method="POST" enctype="multipart/form-data">
		     <div class="div_deg">
		      
			  <div>
			    <label>Username</label>
			    <input type="text" name="username"
				value="<?php echo "{$info['username']}"; ?>"
				>
			  </div>
			  <div>
			    <label>FirstName</label>
			    <input type="text" name="fname"
				value="<?php echo "{$info['fname']}"; ?>"
				>
			  </div>
			  <div>
			    <label>LastName</label>
			    <input type="text" name="lname"
				value="<?php echo "{$info['lname']}"; ?>"
				>
			  </div>
			  <div>
			    <label>Email</label>
				<input type="email" name="email"
				value="<?php echo "{$info['email']}"; ?>"
				>
			  </div>
			  <div>
			    <label>Password</label>
			    <input type="text" name="password"
				value="<?php echo "{$info['password']}"; ?>"
				>
			  </div>
			  <div>
			    <label>Saved Jobs</label>
			    <input type="text" name="saved_jobs"
				value="<?php echo "{$info['saved_jobs']}"; ?>"
				>
			  </div>
			  <div>
			    <label>Skills</label>
			    <input type="text" name="skill"
				value="<?php echo "{$info['skill']}"; ?>"
				>
		      </div>
			  <div>
			    <label>Experience</label>
			    <input type="text" name="experience"
				value="<?php echo "{$info['experience']}"; ?>"
				>
			  </div>
			  <div>
			    <label>Resume</label>
			    <input type="file" name="resume"
				value="<?php echo "{$info['resume']}"; ?>"
				>
			  </div>
			  <div>
			    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
			  </div>
			 </div>
		   </form>
		  </div> 
		</div>
		
</body>
</html>