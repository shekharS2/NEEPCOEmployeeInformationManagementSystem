<?php
    include('session.php');
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="select.css">
    </head>

    <body>
        <div id="navbar">

            <div style="position: relative; left: 0; top: 0;">
                <img src="resources/banner.jpg" class="navBanner"/>
                <img src="resources/neepco-logo.webp" class="navLogo"/>
        	</div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br>


        <div class="tab">
            <button class="tablinks" onclick="openPage(event, 'Dashboard')" id="defaultOpen">Dashboard</button>
            <button class="tablinks" onclick="openPage(event, 'EmployeeInfo')">EmployeeInfo</button>
        </div>

        <div id="Dashboard" class="tabcontent" style="position:relative;padding-top:56.25%;">
            <iframe src="Dashboard.html" frameborder="0" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
        </div>

        <div id="EmployeeInfo" class="tabcontent" style="position:relative;padding-top:56.25%;">
            <iframe src="EmployeeInfo.php" frameborder="0" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
        </div>

        <br><br><br>

        <div class="tab1">
            <?php
                $sql = "SELECT first_name, last_name FROM personal_info WHERE id='$login_session'";
                $result=mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <p>User: <?php echo($row['first_name']." ".$row['last_name']); ?></p>
                        <?php
                    }
                }else{
                    echo"Cannot determine user.";
                }
            ?>

            <h3><a href = "Logout.php">Log Out</a></h3>

            <p>Click <a href="edit_password.php" alt="Change Password">here</a> to change password.</p>
        </div>

        <script src="select.js" ></script>
   
    </body>
</html> 
