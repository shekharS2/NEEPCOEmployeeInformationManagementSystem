<?php
//Database Connection
    include('admin_session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $edit_id = $_GET['edit_id'];
    $index = $_GET['index'];

    //Get ID from Database
    if(isset($_GET['edit_id'])){
        $sql = "SELECT * FROM prev_emp WHERE id='$edit_id'AND pe_no='$index'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $pe_no = $_POST['pe_no'];
        $organisation = $_POST['organisation'];
        $years_of_exp = $_POST['years_of_exp'];
        $role = $_POST['role'];

        $update = "UPDATE prev_emp SET 
        
        pe_no = '$pe_no',
        organisation = '$organisation',
        years_of_exp = '$years_of_exp',
        role = '$role'
        
        WHERE id='$edit_id'AND pe_no='$index'";
        
        $up = mysqli_query($db, $update);
        
        if(!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        }else{
            echo("Successfully edited!");
            header("location: admin_edit_user.php?edit_id=$edit_id");
        }
    }
    
?>
<!--Create Edit form -->
<!doctype html>
<html>
    <body>
        <form method="post">
            <h1>Edit Previous Employment Information</h1>
            <label>Employment history number:</label><input type="text" name="pe_no" placeholder="Employment history number" value="<?php echo $row['pe_no']; ?>"><br/><br/>
            <label>Organisation:</label><input type="text" name="organisation" placeholder="Organisation" value="<?php echo $row['organisation']; ?>"><br/><br/>
            <label>Years of experience:</label><input type="text" name="years_of_exp" placeholder="Years of experience" value="<?php echo $row['years_of_exp']; ?>"><br/><br/>
            <label>Role:</label><input type="text" name="role" placeholder="Role" value="<?php echo $row['role']; ?>"><br/><br/>
            
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
            
            <a href="admin_edit_user.php?edit_id=<?php echo $_GET['edit_id']?>"><button type="button" value="button">Cancel</button></a>
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