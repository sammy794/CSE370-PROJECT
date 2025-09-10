<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
$sql = "SELECT job.id, job.user_id, job.title, job.requirement, user.email
        FROM job
        LEFT JOIN user ON job.user_id = user.id";

$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>FindJob</title>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/postjob.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">Find Jobs</div>
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
		<div class="content">
		     <h1 class="form-title">Browse through these available jobs!!</h1>
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
			    <th class="table_th">Job ID</th>
				<th class="table_th">Recruiter ID</th>
				<th class="table_th">Recruiter email</th>
				<th class="table_th">Job Title</th>
				<th class="table_th">Job Requirements</th>
			  </tr>
			  <?php
			  while($info=$result->fetch_assoc())
			  {
			  ?>
			  
			  <tr>
			    <td class="table_td">
				    <?php echo "{$info['id']}"; ?>
				</td>
				<td class="table_td">
                    <?php echo $info['user_id'] ?? 'ID Not Found'; ?>
                </td>
				<td class="table_td">
                    <?php echo $info['email'] ?? 'Email Not Found'; ?>
                </td>
				<td class="table_td">
				    <?php echo "{$info['title']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['requirement']}"; ?>
				</td>
				
				
			  <?php 
			  			  
			  }
			  
			  ?>
			</table>
			</center>
		</div>
    
		
</body>
</html>

