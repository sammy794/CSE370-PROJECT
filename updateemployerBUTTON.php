<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

$id=$_GET['employer_id'];

$sql="SELECT * FROM user where id='$id'";
$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
	$username=$_POST['username'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	

	
	$query="UPDATE user SET username='$username',fname='$fname',lname='$lname',email='$email',password='$password' WHERE id='$id'";
	
	$result2=mysqli_query($data,$query);
	if($result2)
	{
		header("location:updateemployerPRO.php");
	}
	
}
	

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Employer Profile</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
	
</head>
<body>
        <section id="header">
           <div class="header-title">Employer Profile</div>
		   <div class="logout">
		       <a href="logout.php">Logout</a>
		   </div>
		   <div class="contentT">
		      <center>
		      <h1>Edit Employer Details</h1>
			  <div class="deg">
			     <form action="#" method="POST">
				   <div>
				       <label>Username</label>
					   <input type="text" name="username"
					   value="<?php echo "{$info['username']}"; ?>"
					   >
				   </div>
				   <div>
				       <label>First Name</label>
					   <input type="text" name="fname"
					   value="<?php echo "{$info['fname']}"; ?>"
					   >
				   </div>
				   <div>
				       <label>Last Name</label>
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
			           <input type="submit" class="btn btn-success" name="update" value="Update">
			       </div>
				 </form>
			  </div>
			  </center>
		   </div>
        </section>
		<aside>
		    <ul>
			    <li>
				    <a href="adminhome.php">Home</a>
				</li>
				<li>
				    <a href="adminprofile.php">Admin Profile</a>
				</li>
				<li>
				    <a href="modify_JS_Pro.php">Job Seeker Profiles</a>
				</li>
				<li>
				    <a href="updateemployerPRO.php">Employer Profiles</a>
				</li>
				<li>
				    <a href="viewmessage.php">View Messages</a>
				</li>
			</ul>
		</aside>
</body>
</html>