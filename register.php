<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="job_platform";

$data=mysqli_connect($host,$user,$password,$db);
$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $role     = $_POST['role'];
	
	$check = "SELECT * FROM user WHERE username='$username'";
    $res = mysqli_query($data, $check);
    if (mysqli_num_rows($res) > 0) {
        $error = "❌ Username already exists, please choose another.";
    }
     if (empty($error)) {
        if ($role === "jobseeker") {
            $skills     = $_POST['skill'];
            $experience = $_POST['experience'];
            $flag = 1;

            $sql = "INSERT INTO user (username, fname, lname, email, password, job_seeker_flag, skill, experience)
                    VALUES ('$username', '$fname', '$lname', '$email', '$password', '$flag','$skills', '$experience')";
            $result=mysqli_query($data,$sql);
            if($result) {
				$user_id = mysqli_insert_id($data);
				$_SESSION['user_id'] = $user_id; 
                $_SESSION['username'] = $username;


                header("location:job_seekerhome.php");
                exit;
            }
        } else {
            $flag = 0;
            $sql = "INSERT INTO user (username, fname, lname, email, password, job_seeker_flag, employer_flag)
                    VALUES ('$username', '$fname', '$lname', '$email', '$password', '$flag',1)";
            $result=mysqli_query($data,$sql);
            if($result) {
				$user_id = mysqli_insert_id($data);
				$_SESSION['user_id'] = $user_id; 
                $_SESSION['username'] = $username;
                header("location:employerhome.php");
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> RegistrationForm </title>
    
      
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css" rel="stylesheet"/> 
	  <style>
         .form-section {
            display: none; 
         }
         .form-section.active {
            display: block; 
         }
      </style>

</head>
<body>
    <div class="registration-form">
       <h1>Registration form</h1>
	    <?php if (!empty($error)) : ?>
           <p style="color:red; font-weight:bold;"><?php echo $error; ?></p>
       <?php endif; ?>
	   <p>Select your role:</p>
       <select id="roleSelect" onchange="showForm()">
         <option value="">-- Choose --</option>
         <option value="jobseeker">Job Seeker</option>
         <option value="employer">Employer</option>
       </select>
	   
	   
	   <div id="jobseekerForm" class="form-section">
          <h2>Job Seeker Registration</h2>
          <form action="#" method="POST">
		     <input type="hidden" name="role" value="jobseeker">
             <p>Username:</p>
             <input type="text" name="username" required>
             <p>First Name:</p>
             <input type="text" name="fname" required>
             <p>Last Name:</p>
             <input type="text" name="lname" required>
             <p>Email:</p>
             <input type="email" name="email" required>
             <p>Password:</p>
             <input type="password" name="password" required>
             <p>Skills:</p>
             <input type="text" name="skill" 
			 <p>Experience:</p>
             <input type="text" name="experience" 
             <br><br>
             <input type="submit" value="Register">
          </form>
       </div>
	   
	   <div id="employerForm" class="form-section">
          <h2>Employer Registration</h2>
          <form action="#" method="POST">
		    <input type="hidden" name="role" value="employer">
		    <p>Username:</p>
            <input type="text" name="username" required>
            <p>First Name:</p>
            <input type="text" name="fname" required>
            <p>Last Name:</p>
            <input type="text" name="lname" required>
            <p>Email:</p>
            <input type="email" name="email" required>
            <p>Password:</p>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" value="Register">
          </form>
       </div>
    </div>
	<script>
      function showForm() {
        let role = document.getElementById("roleSelect").value;
        document.getElementById("jobseekerForm").classList.remove("active");
        document.getElementById("employerForm").classList.remove("active");

        if (role === "jobseeker") {
           document.getElementById("jobseekerForm").classList.add("active");
        } else if (role === "employer") {
           document.getElementById("employerForm").classList.add("active");
        }
      }
    </script>
 
</body>
</html>