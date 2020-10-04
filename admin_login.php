<?php
   include("admin_config.php");
   session_start();

   /*If already logged-in*/
    if(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true){
        header("location: admin_user_view.php");
        exit;
    }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['admin_username']); //removes special character from user input
      $mypassword = mysqli_real_escape_string($db,$_POST['admin_password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      
      $result = mysqli_query($db,$sql);
      
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); //fetch associative array
      
    //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //  session_register("myusername");
        $_SESSION['my_admin_username'];
        $_SESSION['admin_login'] = $myusername;
         
         header("location: admin_user_view.php");
      }else {
         $error = "Your Login Name or Password is invalid"; 
      }
   }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Login.css">
    </head>
    <body>
        <form action="" method="POST">
            <!-- <div class="imgcontainer">
                <img src="resources/avatar.jpg" alt="Avatar" class="avatar">
            </div> -->

            <div><h2>ADMIN LOGIN</h2></div>

            <div class="container">
                <label for="username">
                    <b>Username</b>
                </label>
                
                <input type="text" placeholder="Enter Username" name="admin_username" required>

                <br>

                <label for="password">
                    <b>Password</b>
                </label>
                
                <input type="password" placeholder="Enter Password" name="admin_password" required>

                <br>
                
                <button type="submit" value="Submit">Login</button>
                
                <br>

                <!-- <label><input type="checkbox" checked="checked" name="remember"> Remember me</label> -->
            </div>

            <br><br>

            <!-- <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">
                    Forgot <a href="#" style="color:dodgerblue">password</a>?
                </span>

                <br>

                <span class="extra">
                    <p>Don't have an account? <a href="Signup.html" style="color:dodgerblue">Sign-up now!</a></p>
                </span>
            </div> -->
            <br><br>
            <p><a href="Login.php">Click here</a> to go to Employee-login page</p>
        </form>
    </body>
</html>