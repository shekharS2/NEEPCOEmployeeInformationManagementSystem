<?php
   include("config.php");
   session_start();

   /*If already logged-in go to select.html*/
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: select.php");
        exit;
    }
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']); //removes special character from user input
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      
      $result = mysqli_query($db,$sql);
      
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); //fetch associative array
      
    //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //  session_register("myusername");
        $_SESSION['myusername'];
        $_SESSION['login_user'] = $myusername;
         
         header("location: select.php");
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
            <div class="imgcontainer">
                <img src="resources/avatar.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="username">
                    <b>Username</b>
                </label>
                
                <input type="text" placeholder="Enter Username" name="username" required>

                <br>

                <label for="password">
                    <b>Password</b>
                </label>
                
                <input type="password" placeholder="Enter Password" name="password" required>

                <br>
                
                <button type="submit" value="Submit">Login</button>
                
                <br>

                <!-- <label><input type="checkbox" checked="checked" name="remember"> Remember me</label> -->
            </div>

            <br><br>

            <div class="container" style="background-color:#f1f1f1">
                <!-- <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">
                    Forgot <a href="#" style="color:dodgerblue">password</a>?
                </span> -->

                <br><br>

                <!-- <span class="extra">
                    <p>Don't have an account? <a href="Signup.html" style="color:dodgerblue">Sign-up now!</a></p>
                </span> -->
                <p><a href="admin_login.php">Click here</a> to go to admin-login page</p>
            </div>
        </form>
    </body>
</html>