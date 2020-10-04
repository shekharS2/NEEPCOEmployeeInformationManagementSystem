<?php
   include('admin_config.php');
   session_start();
   
   $admin_check = $_SESSION['admin_login'];
   
   $ses_sql = mysqli_query($db,"select id from admin where username = '$admin_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $admin_login_session = $row['id'];
   
   if(!isset($_SESSION['admin_login'])){
      header("location:admin_login.php");
      die();
   }
?>