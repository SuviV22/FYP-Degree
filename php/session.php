<?php
   include('dataconnection.php');
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from users where userID = '$user_check' ");
   
   $ses_row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $ses_row['userID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: login.php");
      die();
   }
?>