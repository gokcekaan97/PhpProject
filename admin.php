<?php
include("db.php");

session_start(); 

$username=($_POST['username']);
$password=($_POST['password']);

$result=mysqli_query($conn ,"SELECT * FROM members WHERE username='$username' and password='$password'");

$count=mysqli_num_rows($result);

if($count >0){
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  header("location:admin_pan.php");
}
 else {
  echo 'Wrong Username or Password! Return to <a href="admin.html">login</a>';
  }
?>