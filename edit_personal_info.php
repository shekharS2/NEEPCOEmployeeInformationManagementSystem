<?php
//Database Connection
    include('session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //Get ID from Database
    if(isset($_GET['edit_id'])){
        $sql = "SELECT * FROM personal_info WHERE id='$login_session'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
    //Update Information
    if(isset($_POST['btn-update'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $religion = $_POST['religion'];
        $blood_group = $_POST['blood_group'];
        $pwd_type = $_POST['pwd_type'];
        $domicile_state = $_POST['domicile_state'];
        $present_address = $_POST['present_address'];
        $permanent_address = $_POST['permanent_address'];
        $email = $_POST['email'];
        $identification_mark = $_POST['identification_mark'];
        $medical_history = $_POST['medical_history'];
        $pan_no = $_POST['pan_no'];
        $aadhar_no = $_POST['aadhar_no'];
        $medical_card = $_POST['medical_card'];
        $designation = $_POST['designation'];
        $designation_joining_date = $_POST['designation_joining_date'];
        $initial_probation_clearance_date = $_POST['initial_probation_clearance_date'];
        $probation_clearance_order = $_POST['probation_clearance_order'];
        $grade = $_POST['grade'];
        $project = $_POST['project'];
        $dept = $_POST['dept'];
        $discipline = $_POST['discipline'];
        $category = $_POST['category'];
        $gender = $_POST['gender'];
        $marital_status = $_POST['marital_status'];
        $superannuation_date = $_POST['superannuation_date'];

        $update = "UPDATE personal_info SET 
        first_name = '$first_name',
        last_name = '$last_name',
        dob = '$dob',
        religion = '$religion',
        blood_group = '$blood_group',
        pwd_type = '$pwd_type',
        domicile_state = '$domicile_state',
        present_address = '$present_address',
        permanent_address = '$permanent_address',
        email = '$email',
        identification_mark = '$identification_mark',
        medical_history = '$medical_history',
        pan_no = '$pan_no',
        aadhar_no = '$aadhar_no',
        medical_card = '$medical_card',
        designation = '$designation',
        designation_joining_date = '$designation_joining_date',
        initial_probation_clearance_date = '$initial_probation_clearance_date',
        probation_clearance_order = '$probation_clearance_order',
        grade = '$grade',
        project = '$project',
        dept = '$dept',
        discipline = '$discipline',
        category = '$category',
        gender = '$gender',
        marital_status = '$marital_status',
        superannuation_date = '$superannuation_date'
        WHERE id = $login_session";
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
            <h1>Edit Personal Information</h1>
            <label>First name:</label><input type="text" name="first_name" placeholder="First name" value="<?php echo $row['first_name']; ?>"><br/><br/>
            <label>Last name:</label><input type="text" name="last_name" placeholder="Last name" value="<?php echo $row['last_name']; ?>"><br/><br/>
            <label>Date of birth:</label><input type="text" name="dob" placeholder="Date of birth" value="<?php echo $row['dob']; ?>"><br/><br/>
            <label>Religion:</label><input type="text" name="religion" placeholder="Religion" value="<?php echo $row['religion']; ?>"><br/><br/>
            <label>Blood-group:</label><input type="text" name="blood_group" placeholder="Blood-group" value="<?php echo $row['blood_group']; ?>"><br/><br/>
            <label>PWD Type:</label><input type="text" name="pwd_type" placeholder="PWD Type" value="<?php echo $row['pwd_type']; ?>"><br/><br/>
            <label>Domicile state:</label><input type="text" name="domicile_state" placeholder="Domicile state" value="<?php echo $row['domicile_state']; ?>"><br/><br/>
            <label>Present address:</label><input type="text" name="present_address" placeholder="Present address" value="<?php echo $row['present_address']; ?>"><br/><br/>
            <label>Permanent address:</label><input type="text" name="permanent_address" placeholder="Permanent address" value="<?php echo $row['permanent_address']; ?>"><br/><br/>
            <label>E-mail:</label><input type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>"><br/><br/>
            <label>Identification mark:</label><input type="text" name="identification_mark" placeholder="Identification mark" value="<?php echo $row['identification_mark']; ?>"><br/><br/>
            <label>Medical history:</label><input type="text" name="medical_history" placeholder="Medical history" value="<?php echo $row['medical_history']; ?>"><br/><br/>
            <label>PAN number:</label><input type="text" name="pan_no" placeholder="PAN number" value="<?php echo $row['pan_no']; ?>"><br/><br/>
            <label>Aadhar number:</label><input type="text" name="aadhar_no" placeholder="Aadhar number" value="<?php echo $row['aadhar_no']; ?>"><br/><br/>
            <label>Medical card:</label><input type="text" name="medical_card" placeholder="Medical card" value="<?php echo $row['medical_card']; ?>"><br/><br/>
            <label>Designation:</label><input type="text" name="designation" placeholder="Designation" value="<?php echo $row['designation']; ?>"><br/><br/>
            <label>Designation joining date:</label><input type="text" name="designation_joining_date" placeholder="Designation joining date" value="<?php echo $row['designation_joining_date']; ?>"><br/><br/>
            <label>Initial probation clearance date:</label><input type="text" name="initial_probation_clearance_date" placeholder="Initial probation clearance date" value="<?php echo $row['initial_probation_clearance_date']; ?>"><br/><br/>
            <label>Probation clearance order:</label><input type="text" name="probation_clearance_order" placeholder="Probation clearance order" value="<?php echo $row['probation_clearance_order']; ?>"><br/><br/>
            <label>Grade:</label><input type="text" name="grade" placeholder="Grade" value="<?php echo $row['grade']; ?>"><br/><br/>
            <label>Project:</label><input type="text" name="project" placeholder="Project" value="<?php echo $row['project']; ?>"><br/><br/>
            <label>Department:</label><input type="text" name="dept" placeholder="Department" value="<?php echo $row['dept']; ?>"><br/><br/>
            <label>Discipline:</label><input type="text" name="discipline" placeholder="Discipline" value="<?php echo $row['discipline']; ?>"><br/><br/>
            <label>Category:</label><input type="text" name="category" placeholder="Category" value="<?php echo $row['category']; ?>"><br/><br/>
            <label>Gender:</label><input type="text" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>"><br/><br/>
            <label>Marital status:</label><input type="text" name="marital_status" placeholder="Marital status" value="<?php echo $row['marital_status']; ?>"><br/><br/>
            <label>Super-annuation date:</label><input type="text" name="superannuation_date" placeholder="Super-annuation date" value="<?php echo $row['superannuation_date']; ?>"><br/><br/>
            
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