<?php
//Database Connection
    include('session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get ID from Database
    if(isset($_GET['edit_id'])){
        $sql = "SELECT * FROM aca_qualification WHERE id='$login_session'AND aq_no=". $_GET['edit_id'];
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $aq_no = $_POST['aq_no'];
        $course = $_POST['course'];
        $institute = $_POST['institute'];
        $result = $_POST['result'];
        $passing_year = $_POST['passing_year'];

        $update = "UPDATE aca_qualification SET 
        
        aq_no = '$aq_no',
        course = '$course',
        institute = '$institute',
        result = '$result',
        passing_year = '$passing_year'
        
        WHERE id = $login_session AND aq_no = ". $_GET['edit_id'];
        
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
            <h1>Edit Academic Qualification</h1>
            <label>Course number:</label><input type="text" name="aq_no" placeholder="Course number" value="<?php echo $row['aq_no']; ?>"><br/><br/>
            <label>Course:</label><input type="text" name="course" placeholder="Course" value="<?php echo $row['course']; ?>"><br/><br/>
            <label>Institute:</label><input type="text" name="institute" placeholder="Institute" value="<?php echo $row['institute']; ?>"><br/><br/>
            <label>Result:</label><input type="text" name="result" placeholder="Result" value="<?php echo $row['result']; ?>"><br/><br/>
            <label>Year of passing:</label><input type="text" name="passing_year" placeholder="Year of passing" value="<?php echo $row['passing_year']; ?>"><br/><br/>


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