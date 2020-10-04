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
        $sql = "SELECT * FROM posting_history WHERE id='$edit_id'AND poh_no= '$index'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $poh_no = $_POST['poh_no'];
        $project = $_POST['project'];
        $dept = $_POST['dept'];
        $posting_period = $_POST['posting_period'];
        $reporting_auth = $_POST['reporting_auth'];
        $job_desc = $_POST['job_desc'];
        $special_achv = $_POST['special_achv'];

        $update = "UPDATE posting_history SET 
        
        poh_no ='$poh_no',
        project = '$project',
        dept = '$dept',
        posting_period = '$posting_period',
        reporting_auth = '$reporting_auth',
        job_desc = '$job_desc',
        special_achv = '$special_achv'
        
        WHERE id='$edit_id'AND poh_no= '$index'";
        
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
            <h1>Edit Posting History</h1>
            <label>Posting number:</label><input type="text" name="poh_no" placeholder="Posting number" value="<?php echo $row['poh_no']; ?>"><br/><br/>
            <label>Project:</label><input type="text" name="project" placeholder="Project" value="<?php echo $row['project']; ?>"><br/><br/>
            <label>Department:</label><input type="text" name="dept" placeholder="Department" value="<?php echo $row['dept']; ?>"><br/><br/>
            <label>Posting period:</label><input type="text" name="posting_period" placeholder="Posting period" value="<?php echo $row['posting_period']; ?>"><br/><br/>
            <label>Repoting authority:</label><input type="text" name="reporting_auth" placeholder="Reporting authority" value="<?php echo $row['reporting_auth']; ?>"><br/><br/>
            <label>Job description:</label><input type="text" name="job_desc" placeholder="Job description" value="<?php echo $row['job_desc']; ?>"><br/><br/>
            <label>Special achievements:</label><input type="text" name="special_achv" placeholder="Special achievements" value="<?php echo $row['special_achv']; ?>"><br/><br/>
            
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