<?php
//Database Connection
    include('admin_session.php');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // $edit_id = $_GET['edit_id'];
    // $index = $_GET['index'];

    //Get ID from Database
    if(!isset($_GET['new_id'])){
        // $sql = "SELECT * FROM aca_qualification WHERE id=".$_GET['edit_id']."AND aq_no=". $_GET['index'];
        // $sql = "SELECT * FROM aca_qualification WHERE id=$edit_id AND aq_no=$index";
        // $result = mysqli_query($db, $sql);
        // $row = mysqli_fetch_assoc($result);
        echo("Error in getting new ID!!");
    }

    $new_id = $_GET['new_id'];
    
    //Update Information
    if(isset($_POST['btn-update'])){
        //Users
        $username = $_POST['username'];
        $password = $_POST['password'];
        $image_location = "NA";

        //Academic Qualification
        $aq_no = 1;
        $course = "NA";
        $institute = "NA";
        $result = "NA";
        $passing_year = "NA";

        //Family Info
        $family_member_no = 1;
        $name = "NA";
        $gender = "NA";
        $dob = "NA";
        $relation = "NA";
        $dependant = "NA";

        //Personal  Info
        $first_name = "NA";
        $last_name = "NA";
        $dob = "NA";
        $religion = "NA";
        $blood_group = "NA";
        $pwd_type = "NA";
        $domicile_state = "NA";
        $present_address = "NA";
        $permanent_address = "NA";
        $email = "NA";
        $identification_mark = "NA";
        $medical_history = "NA";
        $pan_no = "NA";
        $aadhar_no = "NA";  //////
        $medical_card = "NA";
        $designation = "NA";
        $designation_joining_date = "NA";
        $initial_probation_clearance_date = "NA";
        $probation_clearance_order = "NA";
        $grade = "NA";
        $project = "NA";
        $dept = "NA";
        $discipline = "NA";
        $category = "NA";
        $gender = "NA";
        $marital_status = "NA";
        $superannuation_date = "NA";

        //Posting History
        $poh_no = 1;
        $project = "NA";
        $dept = "NA";
        $posting_period = "NA";
        $reporting_auth = "NA";
        $job_desc = "NA";
        $special_achv = "NA";

        //Prev Employment
        $pe_no = 1;
        $organisation = "NA";
        $years_of_exp = "NA";
        $role = "NA";

        //Professional Qualification
        $pq_no = 1;
        $course = "NA";
        $institute = "NA";
        $result = "NA";
        $passing_year = "NA";

        //Promotion History
        $p_no = 1;
        $probation_clearance_order = "NA";
        $designation = "NA";
        $period = "NA";
        $promotion_order = "NA";

        //Training History
        $t_no = 1;
        $type = "NA";
        $institute = "NA";
        $details = "NA";
        $period = "NA";
        $feedback = "NA";


        //Users
        $insert1 = "INSERT INTO users (id, username, password, image_location)
        VALUES ('$new_id', '$username', '$password', '$image_location')";

        //Academic Qualification
        $insert2 = "INSERT INTO aca_qualification (id, aq_no, course, institute, result, passing_year) 
        VALUES ('$new_id', '$aq_no', '$course', '$institute', '$result', '$passing_year')";

        //Family Info
        $insert3 = "INSERT INTO family_info (id, family_member_no,name,gender,dob,relation,dependant)
        VALUES ('$new_id', '$family_member_no','$name','$gender','$dob','$relation','$dependant')";


        //Personal  Info
        $insert4 = "INSERT INTO personal_info (id, first_name, last_name, dob, religion, blood_group, pwd_type, domicile_state, present_address, permanent_address, email, identification_mark, medical_history, pan_no, aadhar_no, medical_card, designation, designation_joining_date, initial_probation_clearance_date, probation_clearance_order, grade, project, dept, discipline, category, gender, marital_status, superannuation_date)
        VALUES ('$new_id', '$first_name', '$last_name', '$dob', '$religion', '$blood_group', '$pwd_type', '$domicile_state', '$present_address', '$permanent_address', '$email', '$identification_mark', '$medical_history', '$pan_no', '$aadhar_no', '$medical_card', '$designation', '$designation_joining_date', '$initial_probation_clearance_date', '$probation_clearance_order', '$grade', '$project', '$dept', '$discipline', '$category', '$gender', '$marital_status', '$superannuation_date')";

        //Posting History
        $insert5 = "INSERT INTO posting_history (id, poh_no, project, dept,posting_period, reporting_auth, job_desc, special_achv)
        VALUES ('$new_id', '$poh_no', '$project', '$dept', '$posting_period', '$reporting_auth', '$job_desc', '$special_achv')";

        //Prev Employment
        $insert6 = "INSERT INTO prev_emp (id, pe_no, organisation, years_of_exp, role)
        VALUES ('$new_id', '$pe_no', '$organisation', '$years_of_exp', '$role')";
        

        //Professional Qualification
        $insert7 = "INSERT INTO prof_qualification (id, pq_no, course, institute, result, passing_year)
        VALUES ('$new_id', '$pq_no', '$course', '$institute', '$result', '$passing_year')";
        

        //Promotion History
        $insert8 = "INSERT INTO promotion_history (id, p_no, probation_clearance_order, designation, period, promotion_order)
        VALUES ('$new_id', '$p_no', '$probation_clearance_order', '$designation', '$period', '$promotion_order')";
        

        //Training History
        $insert9 = "INSERT INTO training_history (id, t_no, type, institute, details, period, feedback)
        VALUES ('$new_id', '$t_no', '$type', '$institute', '$details', '$period', '$feedback')";
        

        
        $in1 = mysqli_query($db, $insert1);
        $in2 = mysqli_query($db, $insert2);
        $in3 = mysqli_query($db, $insert3);
        $in4 = mysqli_query($db, $insert4);
        $in5 = mysqli_query($db, $insert5);
        $in6 = mysqli_query($db, $insert6);
        $in7 = mysqli_query($db, $insert7);
        $in8 = mysqli_query($db, $insert8);
        $in9 = mysqli_query($db, $insert9); 
        
        if(!isset($in1)){
            die ("Error $in1" .mysqli_connect_error());
        }
        // elseif(!isset($in2)){
        //     die ("Error $in2" .mysqli_connect_error());
        // }elseif(!isset($in3)){
        //     die ("Error $in3" .mysqli_connect_error());
        // }elseif(!isset($in4)){
        //     die ("Error $in4" .mysqli_connect_error());
        // }elseif(!isset($in5)){
        //     die ("Error $in5" .mysqli_connect_error());
        // }elseif(!isset($in6)){
        //     die ("Error $in6" .mysqli_connect_error());
        // }elseif(!isset($in7)){
        //     die ("Error $in7" .mysqli_connect_error());
        // }elseif(!isset($in8)){
        //     die ("Error $in8" .mysqli_connect_error());
        // }elseif(!isset($in9)){
        //     die ("Error $in9" .mysqli_connect_error());
        // }
        else{
            echo("Successfully edited!");
            header("location: admin_user_view.php");
        }
    }
    
?>
<!--Create Edit form -->
<!doctype html>
<html>
    <body>
        <form method="post">
            <h1>Enter basic user details</h1>
            <br>
            <h3><?php echo("NEW USER ID is: ".$new_id) ?></h3>
            <br><br>
            <label>Username:</label><input type="text" name="username" placeholder="Username" value=""><br/><br/>
            <label>Password:</label><input type="password" name="password" placeholder="Password" value=""><br/><br/>

            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
            
            <a href="admin_user_view.php"><button type="button" value="button">Cancel</button></a>
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