<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Job Hub </title>
    
      
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css" rel="stylesheet"/> 
</head>
<body>

    <section class="login-section">
         <form action="signin.php" method="post" class="login-form">
		    <h1 class="login-error">
		     <?php
		  
		       error_reporting(0);
		       session_start();
		       session_destroy();
		       echo $_SESSION['loginMessage'];
		     ?>
		    </h1>
            <label for="username">Username</label>
            <input type="text" id="fname" name="username">

            <label for="password">Password</label>
            <input type="password" id="pass" name="password">

            <input type="submit" value="Log In">
			<p class="register-text">
              Don't have an account? 
              <a href="register.php">Register Now</a>
            </p>
         </form>
    </section>

</body>
</html>
  

