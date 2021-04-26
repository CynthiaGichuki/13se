
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <title>CYNTHIA'S STATION > Reset Password</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!-- start header div -->
    <div id="header">
        <h3>BLUE COLLAR JOBS> Reset Password</h3>
    </div>
    <!-- end header div -->  
      
    <!-- start wrap div -->  
    <div id="wrap">
          
        <!-- start php code -->
          
        <!-- stop php code -->
      
        <!-- title and description -->   
        <h3>Reset Password</h3>
        <p>Please enter your email. An email will be sent with instructions on how to reset your paswword</p>
          
        <!-- start sign up form -->  
        <form action="reset-request.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" value="" />
            
              <br>
              <br>
            <input type="submit" class="submit_button" value="Sign in" />
            <br>
            <br>

            <a href="forgot_password.php"> Forgot your password? </a> 
        </form>
        <!-- end sign up form -->
          
          <?php
          
          if(isset($_GET["reset"])){
            if($_GET["reset"]=="success"){
              echo '<p class="signupsuccess">Check your e-mail</p>';
            }
           }
            ?>
    </div>
    <!-- end wrap div -->
</body>
</html>

