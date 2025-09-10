<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM user where employer_flag=1";
$result=mysqli_query($data,$sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EmployerProfiles</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">Employer Profiles</div>
		   <div class="logout">
		       <a href="logout.php">Logout</a>
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
		<div class="contentt">
		      <h1 class="form-title2">View Employer Details</h1>		  
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
				<th class="table_th">Password</th>
				<th class="table_th">Delete</th>
				<th class="table_th">Update</th>
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
				    <?php echo "{$info['password']}"; ?>
				</td>
				
				<td class="table_td">
			  <?php 
			  
			  echo "<a onClick=\" javascript:return confirm('Are you sure you want to delete this employer?');\"class='btn btn-danger' href='deleteemployer.php?employer_id={$info['id']}'>Delete</a>"; 
			  ?>
				</td>
				
				<td class="table_td">
				    <?php echo "<a class='btn btn-primary' href='updateemployerBUTTON.php?employer_id={$info['id']}'>Update</a>"; ?>
				</td>
				
			  </tr>
			  <?php
			  
			  }
			  
			  ?>
			</table>
			</center>
		</div>
		
</body>
</html>
			