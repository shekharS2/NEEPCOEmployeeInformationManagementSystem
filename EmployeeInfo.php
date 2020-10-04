<?php
    include('session.php');
?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="EmployeeInfo.css">
        </head>
        <body>

            <h2>Employee Info</h2>

            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Personal Info')" id="defaultOpen">Personal Info</button>
                <button class="tablinks" onclick="openTab(event, 'Family Info')">Family Info</button>
                <button class="tablinks" onclick="openTab(event, 'Prev Employment')">Prev Employment</button>
                <button class="tablinks" onclick="openTab(event, 'Qualification')">Qualification</button>
                <button class="tablinks" onclick="openTab(event, 'Training History')">Training History</button>
                <button class="tablinks" onclick="openTab(event, 'Posting History')">Posting History</button>
                <button class="tablinks" onclick="openTab(event, 'Promotion History')">Promotion History</button>
            </div>

            <br>

            <div id="Personal Info" class="tabcontent">

                <div class='imageUpload'>
                    <?php
                        $sql = "SELECT image_location FROM users WHERE id='$login_session'";
                        $result=mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <img src="<?php echo $row['image_location']; ?>">
                                <?php
                            }
                        }else{
                            echo"0 images found.";
                        }
                    ?>
                </div>

                <br>

                <div class='imageUpload'>
                    <form method="POST" action="upload.php" enctype="multipart/form-data">
                        <label>Update your profile picture:
                        <br><br>
                        </label><input type="file" name="image">
                        <br>
                        <button type="submit">Upload</button>
                    </form>
                </div>

                <br><br>
                
                <table id="t01">
                    
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // echo($login_session);

                        $sql = "SELECT * FROM personal_info WHERE id ='$login_session'";
                        $result = mysqli_query($db, $sql);
                        

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><th>Full Name</th><td>".$row["first_name"]." ".$row["last_name"]."</td></tr>";
                                echo "<tr><th>Date of Birth</th><td>".$row["dob"]."</td></tr>";
                                echo "<tr><th>Religion</th><td>".$row["religion"]."</td></tr>";
                                echo "<tr><th>Blood Group</th><td>".$row["blood_group"]."</td></tr>";
                                echo "<tr><th>PWD Type</th><td>".$row["pwd_type"]."</td></tr>";
                                echo "<tr><th>Domicile State</th><td>".$row["domicile_state"]."</td></tr>";
                                echo "<tr><th>Present Address</th><td>".$row["present_address"]."</td></tr>";
                                echo "<tr><th>nt Address</th><td>".$row["permanent_address"]."</td></tr>";
                                echo "<tr><th>Email</th><td>".$row["email"]."</td></tr>";
                                echo "<tr><th>Identification Mark</th><td>".$row["identification_mark"]."</td></tr>";
                                echo "<tr><th>Medical History</th><td>".$row["medical_history"]."</td></tr>";
                                echo "<tr><th>PAN Number</th><td>".$row["pan_no"]."</td></tr>";
                                echo "<tr><th>AADHAR Number</th><td>".$row["aadhar_no"]."</td></tr>";
                                echo "<tr><th>Medical Card</th><td>".$row["medical_card"]."</td></tr>";
                                echo "<tr><th>Designation</th><td>".$row["designation"]."</td></tr>";
                                echo "<tr><th>Designation Joining Date</th><td>".$row["designation_joining_date"]."</td></tr>";
                                echo "<tr><th>Initial Probation Date</th><td>".$row["initial_probation_clearance_date"]."</td></tr>";
                                echo "<tr><th>Probation Clearance Order</th><td>".$row["probation_clearance_order"]."</td></tr>";
                                echo "<tr><th>Grade</th><td>".$row["grade"]."</td></tr>";
                                echo "<tr><th>Project</th><td>".$row["project"]."</td></tr>";
                                echo "<tr><th>Department</th><td>".$row["dept"]."</td></tr>";
                                echo "<tr><th>Discipline</th><td>".$row["discipline"]."</td></tr>";
                                echo "<tr><th>Category</th><td>".$row["category"]."</td></tr>";
                                echo "<tr><th>Gender</th><td>".$row["gender"]."</td></tr>";
                                echo "<tr><th>Marital Status</th><td>".$row["marital_status"]."</td></tr>";
                                echo "<tr><th>Superannuation Date</th><td>".$row["superannuation_date"]."</td></tr>"; 
                                
                                ?><tr><th>Actions</th><td><a href="edit_personal_info.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></td><tr><?php
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Family Info" class="tabcontent">

                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM family_info WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Name</th><th>Gender</th><th>Date of Birth</th><th>Relation</th><th>Dependant</th><th>Actions</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["name"]."</td><td>".$row["gender"]."</td><td>".$row["dob"]."</td><td>".$row["dependant"]."</td><td>".$row["relation"]."</td>";
     ///////////                           ?><td><a href="edit_family_info.php?edit_id=<?php echo $row['family_member_no']; ?>" alt="edit" >Edit</a></td><tr><?php
                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Prev Employment" class="tabcontent">

                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM prev_emp WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Organisation</th><th>Years of Experience</th><th>Roles and Responsibilities</th><th>Actions</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["organisation"]."</td><td>".$row["years_of_exp"]."</td><td>".$row["role"]."</td>";
                            
                                ?><td><a href="edit_prev_employment.php?edit_id=<?php echo $row['pe_no']; ?>" alt="edit" >Edit</a></td><tr><?php


                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Qualification" class="tabcontent">

                <h2>Academic Qualification</h2>
                
                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM aca_qualification WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Course</th><th>University/Institute</th><th>Div./CGPA</th><th>Year of Passing</th><th>Action</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["course"]."</td><td>".$row["institute"]."</td><td>".$row["result"]."</td><td>".$row["passing_year"]."</td>";
                            
                                ?><td><a href="edit_aca_qualification.php?edit_id=<?php echo $row['aq_no']; ?>" alt="edit" >Edit</a></td><tr><?php

                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>

                <h2>Professional Qualification</h2>
                
                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM prof_qualification WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Course</th><th>University/Institute</th><th>Div./CGPA</th><th>Year of Passing</th><th>Action</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["course"]."</td><td>".$row["institute"]."</td><td>".$row["result"]."</td><td>".$row["passing_year"]."</td>";
                            
                                
                                ?><td><a href="edit_prof_qualification.php?edit_id=<?php echo $row['pq_no']; ?>" alt="edit" >Edit</a></td><tr><?php
 
                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Training History" class="tabcontent">

                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM training_history WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Type</th><th>Training Institute</th><th>Training Details</th><th>Training Period</th><th>Feedback</th><th>Action</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["type"]."</td><td>".$row["institute"]."</td><td>".$row["details"]."</td><td>".$row["period"]."</td><td>".$row["feedback"]."</td>";
                                
                                ?><td><a href="edit_training_history.php?edit_id=<?php echo $row['t_no']; ?>" alt="edit" >Edit</a></td><tr><?php

                            
                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Posting History" class="tabcontent">

                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM posting_history WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Project</th><th>Department</th><th>Posting Period</th><th>Reporting Authority</th><th>Job Description</th><th>Special Achievements</th><th>Actions</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["project"]."</td><td>".$row["dept"]."</td><td>".$row["posting_period"]."</td><td>".$row["reporting_auth"]."</td><td>".$row["job_desc"]."</td><td>".$row["special_achv"]."</td>";
                            
                                ?><td><a href="edit_posting_history.php?edit_id=<?php echo $row['poh_no']; ?>" alt="edit" >Edit</a></td><tr><?php

                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <div id="Promotion History" class="tabcontent">
                <table id="t01">
                    <?php
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM promotion_history WHERE id='$login_session'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr><th>Sl. No.</th><th>Designation</th><th>Period</th><th>Promotion/Appointment Order</th><th>Probation Clearance Order</th><th>Action</th></tr>";
                            // output data of each row
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo"<tr><td>".$i."</td><td>".$row["designation"]."</td><td>".$row["period"]."</td><td>".$row["promotion_order"]."</td><td>".$row["probation_clearance_order"]."</td>";
                            
                                ?><td><a href="edit_promotion_history.php?edit_id=<?php echo $row['p_no']; ?>" alt="edit" >Edit</a></td><tr><?php


                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </table>
            </div>

            <script src="EmployeeInfo.js"></script>
        
        </body>
    </html>
