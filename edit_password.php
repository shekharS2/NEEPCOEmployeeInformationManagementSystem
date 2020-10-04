<?php
//Database Connection
    include('session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get ID from Database
    $sql = "SELECT * FROM users WHERE id='$login_session'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $password = $_POST['password'];

        $update = "UPDATE users SET password='$password' WHERE id = $login_session";
        $up = mysqli_query($db, $update);
        
        if(!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        }else{
            echo("Password changed successfully!");
            echo("Please login again.");
            header("location: Logout.php");

        }
    }
    
?>
<!--Create Edit form -->
<!doctype html>
<html>
    <body>
        <form method="post">
            <h1>Change your password</h1>
            <label>Enter new password:</label><input type="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>"><br/><br/>
                  
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Change Password</strong></button>
            
            <a href="select.php"><button type="button" value="button">Cancel</button></a>
        </form>
        <!-- Alert for Updating -->
        <script>
            function update(){
                var x;
                if(confirm("Updated data Sucessfully") == true){
                    x= "update";
                }
            }
        </script>
    </body>
</html>