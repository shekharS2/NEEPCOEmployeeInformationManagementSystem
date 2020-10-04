<?php
//Database Connection
    include('admin_session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $edit_id = $_GET['edit_id'];
    
    //Get ID from Database
    $sql = "SELECT * FROM users WHERE id='$edit_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $password = $_POST['password'];

        $update = "UPDATE users SET password='$password' WHERE id = $edit_id";
        $up = mysqli_query($db, $update);
        
        if(!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        }else{
            echo("Password changed successfully!");
            header("location: admin_user_view.php");

        }
    }
    
?>
<!--Create Edit form -->
<!doctype html>
<html>
    <body>
        <form method="post">
            <h1>Change password</h1>
            <label>Enter new password:</label><input id="password" type="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>"><br/><br/>
                  
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Change Password</strong></button>
            
            <a href="admin_user_view.php"><button type="button" value="button">Cancel</button></a>
        </form>
        <p id="error_para" ></p>


        <!-- Alert for Updating -->
        <script>
            // function update(){
            //     var x;
            //     if(confirm("Updated data Sucessfully") == true){
            //         x= "update";
            //     }
            // }
             function update()
            {
                var error="";
                //     var name = document.getElementById( "name" );
                    // if( name.value == "" )
                    // {
                    //     error = " You Have To Write Your Name. ";
                    //     document.getElementById( "error_para" ).innerHTML = error;
                    //     return false;
                    // }

                //     var email = document.getElementById( "email_of_user" );
                //     if( email.value == "" || email.value.indexOf( "@" ) == -1 )
                //     {
                //         error = " You Have To Write Valid Email Address. ";
                //         document.getElementById( "error_para" ).innerHTML = error;
                //         return false;
                //     }

                var password = document.getElementById( "password" );
                if( password.value == "" || password.value >= 8 )
                {
                    error = " Password Must Be More Than Or Equal To 8 Digits. ";
                    document.getElementById( "error_para" ).innerHTML = error;
                    // return false;
                }

                else
                {
                    var x;
                    if(confirm("Updated data Sucessfully") == true){
                        x= "update";
                    }
                }
            }
        </script>
    </body>
</html>