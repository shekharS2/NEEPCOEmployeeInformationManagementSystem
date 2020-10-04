<?php
	include('admin_session.php');
	$fileinfo=PATHINFO($_FILES["image"]["name"]);//
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];//
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);//
	$location="upload/".$newFilename;
 
    $sql = "UPDATE users SET image_location='$location' WHERE id=".$_GET['edit_id'];

	mysqli_query($db, $sql);
	$edit_id = $_GET['edit_id'];
	header("location:admin_edit_user.php?edit_id=$edit_id");
?>