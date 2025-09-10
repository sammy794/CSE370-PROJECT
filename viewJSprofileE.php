<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM user where job_seeker_flag=1";
$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Job Candidate Profiles</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">Job Candidate Profiles</div>
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
				    <a href="viewJSprofileE.php">Job Candidate Profiles</a>
				</li>
				<li>
				    <a href="postjob.php">Post Job</a>
				</li>
				<li>
				<li>
				    <a href="contactusE.php">ContactUS</a>
				</li>
			</ul>
		</aside>
		<div class="contentt">
		      <h1 class="form-title2">View Job Candidate Details</h1>		  
		</div>
		<?php
		    if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}
			unset($_SESSION['message']);
		?>
		   
        <div class="content">
		    <center>
		    <table border="1px">
			  <tr>
			    <th class="table_th">Username</th>
				<th class="table_th">FirstName</th>
				<th class="table_th">LastName</th>
				<th class="table_th">Email</th>
				<th class="table_th">SavedJobs</th>
				<th class="table_th">Skills</th>
				<th class="table_th">Experience</th>
				<th class="table_th">Resume</th>
			  </tr>
			  <?php
			  while($info=$result->fetch_assoc())
			  {
			  ?>
			  
			  <tr>
			    <td class="table_td">
				    <?php echo "{$info['username']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['fname']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['lname']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['email']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['saved_jobs']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['skill']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['experience']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['resume']}"; ?>
				</td>
				
			  <?php
			  
			  }
			  
			  ?>
			</table>
			</center>
		</div>
    
        
</body>
</html>