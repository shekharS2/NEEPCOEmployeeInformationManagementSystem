<?php
    include('admin_session.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="EmployeeInfo.css">
    </head>
    <body>

        <h2>Employees List</h2>

        <table id="t01">
            <?php
                
                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM users";
                $result = mysqli_query($db, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<tr><th>Sl. No.</th><th>ID</th><th>USERNAME</th><th>EDIT</th><th>CHANGE PASSWORD</th></tr>";
                    // output data of each row
                    $i = 1;
                    $i1 = 101;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo"<tr><td>".$i."</td><td>".$row["id"]."</td><td>".$row["username"]."</td>";
                    
                        ?><td><a href="admin_edit_user.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></td><?php
                        ?><td><a href="admin_edit_password.php?edit_id=<?php echo $row['id']; ?>" alt="edit_password" >Change Password</a></td><tr><?php

                        $i++;
                        $i1++;
                    }
                    
                } else {
                    echo "0 results";
                }
            ?>
        </table>

        <br><br><br>

        <div>
            <table>
                <tr>
                    <td><a href="admin_create_new_user.php?new_id=<?php echo $i1 ?>">Create</a> new user profile <br><br>
                    <?php echo("NEXT USER ID: ".$i1); ?></td>

                    <td><h3><a href = "admin_logout.php">Log Out</a></h3></td>
                </tr>
            </table>
        <div>
    </body>
</html>