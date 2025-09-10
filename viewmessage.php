<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
$sql = "SELECT message.id, message.user_id, message.subject, message.content,
               user.username, user.email
        FROM message
        LEFT JOIN user ON message.user_id = user.id";


$result=mysqli_query($data,$sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Messages</title>
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/employer.css" rel="stylesheet"/>
	
</head>
<body>
        <section id="header">
           <div class="header-title">Messages</div>
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
		<div class="content">
		     <h1 class="form-title">View Messages</h1>
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
			    <th class="table_th">Message ID</th>
				<th class="table_th">User ID</th>
				<th class="table_th">Username</th>
				<th class="table_th">Email</th>
				<th class="table_th">Subject</th>
				<th class="table_th">Content</th>
				<th class="table_th">Delete</th>
				
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
				    <?php echo $info['user_id'] ?? 'User id Not Found'; ?>
				</td>
				<td class="table_td">
				    <?php echo $info['username'] ?? 'Username Not Found'; ?>
				</td>
				<td class="table_td">
                   <?php if(!empty($info['email'])): ?>
                      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $info['email']; ?>" target="_blank">
                          <?php echo $info['email']; ?>
                      </a>
                   <?php else: ?>
                        Email Not Found
                   <?php endif; ?>
                </td>


				<td class="table_td">
				    <?php echo "{$info['subject']}"; ?>
				</td>
				<td class="table_td">
				    <?php echo "{$info['content']}"; ?>
				</td>
				
				<td class="table_td">
			  <?php 
			  
			  echo "<a onClick=\" javascript:return confirm('Are you sure you want to delete this message?');\"class='btn btn-danger' href='deletemsg.php?message_id={$info['id']}'>Delete</a>"; 
			  ?>
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