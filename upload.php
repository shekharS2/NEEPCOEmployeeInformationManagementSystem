<?php
	include('session.php');
	$fileinfo=PATHINFO($_FILES["image"]["name"]);//
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];//
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);//
	$location="upload/".$newFilename;
 
    $sql = "UPDATE users SET image_location='$location' WHERE id='$login_session'";

	mysqli_query($db, $sql);
	header('location:EmployeeInfo.php');
?>