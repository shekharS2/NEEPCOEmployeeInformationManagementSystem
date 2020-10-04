<?php
//Database Connection
    include('session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get ID from Database
    if(isset($_GET['edit_id'])){
        $sql = "SELECT * FROM promotion_history WHERE id='$login_session'AND p_no=". $_GET['edit_id'];
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $p_no = $_POST['p_no'];
        $probation_clearance_order = $_POST['probation_clearance_order'];
        $designation = $_POST['designation'];
        $period = $_POST['period'];
        $promotion_order = $_POST['promotion_order'];

        $update = "UPDATE promotion_history SET 
        
        p_no = '$p_no',
        probation_clearance_order = '$probation_clearance_order',
        designation = '$designation',
        period = '$period',
        promotion_order = '$promotion_order'
        
        WHERE id = $login_session AND p_no=". $_GET['edit_id'];
        
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
            <h1>Edit Promotion History</h1>
            <label>Promotion number:</label><input type="text" name="p_no" placeholder="Promotion number" value="<?php echo $row['p_no']; ?>"><br/><br/>
            <label>Probation clearance order:</label><input type="text" name="probation_clearance_order" placeholder="Probation clearance order" value="<?php echo $row['probation_clearance_order']; ?>"><br/><br/>
            <label>Designation:</label><input type="text" name="designation" placeholder="Designation" value="<?php echo $row['designation']; ?>"><br/><br/>
            <label>Period:</label><input type="text" name="period" placeholder="Period" value="<?php echo $row['period']; ?>"><br/><br/>
            <label>Promotion order:</label><input type="text" name="promotion_order" placeholder="Promotion order" value="<?php echo $row['promotion_order']; ?>"><br/><br/>

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