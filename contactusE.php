<?php
session_start();

$employer_id = $_SESSION['user_id'];
$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['send_message']))
{
	$subject=$_POST['subject'];
	$content=$_POST['content'];
	
	$sql="INSERT INTO message(user_id,subject,content) VALUES ('$employer_id','$subject','$content')";
	
	$result=mysqli_query($data,$sql);
	if($result)
	{
		echo "<script type='text/javascript'>
		alert('Message Sent Successfully!');
		 </script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ContactUS</title>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/animate.min.css" rel="stylesheet"/>
    <link href="css/contactus.css" rel="stylesheet"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
        <section id="header">
           <div class="header-title">ContactUS</div>
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
		<div class="content2">
		   <div>
		      <form class="job-form" method="POST" action="#">	  
		         <div class="form-group">
                   <label for="subject">Subject</label>
                   <input type="text" name="subject" required>
                 </div>
		  
		         <div class="form-group">
                   <label for="content">Content</label>
                   <textarea name="content" rows="5" cols="50" placeholder="Enter your queries here..."required></textarea>
                 </div>
		  
		         <div class="form-group">				   
			       <input type="submit" name="send_message" value="Send Message" class="btn btn-success">
		         </div>         
              </form>
		   </div>
		</div>
		<div class="welcome-text">
		    <p>
		            Need help? 
			        Feel free to send your queries here..
		    </p>
			<p>
                Please keep an eye on your mail. We'll get back to you soon!
            </p>
		</div>
</body>
</html>