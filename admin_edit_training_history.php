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
        $sql = "SELECT * FROM training_history WHERE id='$edit_id'AND t_no='$index'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $t_no = $_POST['t_no'];
        $type = $_POST['type'];
        $institute = $_POST['institute'];
        $details = $_POST['details'];
        $period = $_POST['period'];
        $feedback = $_POST['feedback'];

        $update = "UPDATE training_history SET 
        
        t_no = '$t_no',
        type = '$type',
        institute = '$institute',
        details = '$details',
        period = '$period',
        feedback = '$feedback'
        
        WHERE id='$edit_id'AND t_no='$index'";

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
            <h1>Edit Training History</h1>
            <label>Training number:</label><input type="text" name="t_no" placeholder="Training number" value="<?php echo $row['t_no']; ?>"><br/><br/>
            <label>Type:</label><input type="text" name="type" placeholder="Type" value="<?php echo $row['type']; ?>"><br/><br/>
            <label>Institute:</label><input type="text" name="institute" placeholder="Institute" value="<?php echo $row['institute']; ?>"><br/><br/>
            <label>Details:</label><input type="text" name="details" placeholder="Details" value="<?php echo $row['details']; ?>"><br/><br/>
            <label>Period:</label><input type="text" name="period" placeholder="Period" value="<?php echo $row['period']; ?>"><br/><br/>
            <label>Feedback:</label><input type="text" name="feedback" placeholder="Feedback" value="<?php echo $row['feedback']; ?>"><br/><br/>

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