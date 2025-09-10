<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";


$employer_id = $_SESSION['user_id'];
$data=mysqli_connect($host,$user,$password,$db);
$sql = "SELECT job.id AS job_id, job.user_id, job.title, job.requirement,
               user.id AS employer_id
        FROM job
        LEFT JOIN user ON job.user_id = user.id";

		
$result=mysqli_query($data,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PostJob</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
	<style>
    nav.menu a {
		color: white;
        background-color: black;    
        text-decoration: none;
		padding: 10px 20px;
        border-radius: 5px;
		text-align:center
    }
	nav.menu a:hover {
       background-color: #333 !important;
       text-decoration: none !important;
	   text-align:center
    }
    </style>

</head>
<body>
        <section id="header">
           <div class="header-title">Post Job</div>
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
				    <a href="contactusE.php">ContactUS</a>
				</li>
			</ul>
		</aside>
		<div class="content">
		     <h1 class="form-title">View Job Details</h1>
			 <nav class="menu">
                <a href="addjob.php">Add New Jobs</a>
			 </nav>
		</div>
		<?php
		    if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}
			unset($_SESSION['message']);
		?>
		<div class="content2">
		     <center>
			 <table border="1px">
			    <tr>
				   <th class="table_th">JobID</th>
				   <th class="table_th">UserID</th>
				   <th class="table_th">JobTitle</th>
				   <th class="table_th">Requirements</th>
				   <th class="table_th">Delete</th>
				   <th class="table_th">Update</th>
				</tr>
				
				<?php
                while($info=$result->fetch_assoc()) {
                $isOwner = ($info['user_id'] == $_SESSION['user_id']);
    
                ?>
                    <tr>
                       <td class="table_td">
                           <?php echo "{$info['job_id']}"; ?>
                       </td>
                       <td class="table_td">				       
                           <?php echo $info['user_id'] ?? 'User Not Found'; ?>
                       </td>
                       <td class="table_td">
                           <?php echo "{$info['title']}"; ?>
                       </td>
                       <td class="table_td">
                           <?php echo "{$info['requirement']}"; ?>
                       </td>
					   
					   <!-- Delete button -->

                           <td class="table_td">
						       <?php if($isOwner) { ?>
                                   <a onClick="return confirm('Are you sure you want to delete this job?');" 
                                       class="btn btn-danger" 
                                       href="deletejob.php?job_id=<?php echo $info['job_id']; ?>">
                                       Delete
                                   </a>
                               <?php } else { echo "-"; } ?>
                           </td>

                              
                           </td>
                           <td class="table_td">
                               <?php if($isOwner) { ?>
                                  <a class="btn btn-primary" 
                                     href="updatejob.php?job_id=<?php echo $info['job_id']; ?>">
                                     Update
                                  </a>
                               <?php } else { echo "-"; } ?>
                           </td>
                    </tr>
                <?php } ?>
                        
			 </table>
			 </center>
		</div>
    
				
		
</body>
</html>