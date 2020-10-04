<?php
//Database Connection
    include('session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get ID from Database
    if(isset($_GET['edit_id'])){
        $sql = "SELECT * FROM family_info WHERE id='$login_session'AND family_member_no=". $_GET['edit_id'];
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $relation = $_POST['relation'];
        $dependant = $_POST['dependant'];

        $update = "UPDATE family_info SET name='$name', gender='$gender', dob='$dob', relation='$relation', dependant='$dependant' WHERE id = $login_session AND family_member_no=". $_GET['edit_id'];
        $up = mysqli_query($db, $update);
        
        if(!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        }else{
            echo("Successfully edited!");
            header("location: EmployeeInfo.php");
        }
    }
    
?>
<!--Create Edit form -->
<!doctype html>
<html>
    <body>
        <form method="post">
            <h1>Edit Family Information</h1>
            <label>Name:</label><input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>"><br/><br/>
            <label>Gender:</label><input type="text" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>"><br/><br/>
            <label>DOB:</label><input type="text" name="dob" placeholder="DOB" value="<?php echo $row['dob']; ?>"><br/><br/>
            <label>Relation:</label><input type="text" name="relation" placeholder="Relation" value="<?php echo $row['relation']; ?>"><br/><br/>
            <label>Dependant:</label><input type="text" name="dependant" placeholder="Dependant" value="<?php echo $row['dependant']; ?>"><br/><br/>
            
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
            
            <a href="EmployeeInfo.php"><button type="button" value="button">Cancel</button></a>
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