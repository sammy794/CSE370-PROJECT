<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

$id=$_GET['job_id'];

$sql="SELECT * FROM job where id='$id'";
$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
	
	$title=$_POST['title'];
	$requirement=$_POST['requirement'];
	
	$query="UPDATE job SET title='$title',requirement='$requirement' WHERE id='$id'";

$result2=mysqli_query($data,$query);
	if($result2)
	{
		header("location:postjob.php");
	}
	
}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Update Jobs</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
	
</head>
<body>
        <section id="header">
           <div class="header-title">Update Jobs</div>
		   <div class="logout">
		       <a href="logout.php">Logout</a>
		   </div>
		   <div class="contentT">
		      <center>
		      <h1>Edit Job Details</h1>
			  <div class="deg">
			     <form action="#" method="POST">
				   <div>
				       <label>JobID</label>
				          <?php echo "{$info['id']}"; ?>					   
				   </div>
				   <div>
				       <label>UserID</label>
				       <?php echo "{$info['user_id']}"; ?>					   
				   </div>
				   <div>
				       <label>JobTitle</label>
					   <input type="text" name="title"
					   value="<?php echo "{$info['title']}"; ?>"
					   >
				   </div>
				   <div>
				       <label>Requirements</label>
					   <textarea name="requirement"><?php echo $info['requirement']; ?></textarea>
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
				   
				   
				   
</body>
</html>