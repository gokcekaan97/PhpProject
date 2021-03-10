<?php
include("db.php");

session_start(); 
$_SESSION['Product']=array();
$_SESSION['Price']=array();
$_SESSION['Id']=array();
$username=($_POST['username']);
$password=($_POST['password']);

$result=mysqli_query($conn ,"SELECT * FROM members WHERE username='$username' and password='$password'");
$count=mysqli_num_rows($result);

$admin=mysqli_query($conn,"SELECT * FROM members WHERE username='$username' and adminPri='1' and password='$password'");
$adminCount=mysqli_num_rows($admin);
echo $adminCount;
if($count >0){
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  if($adminCount>0){
	  header("location:admin_pan.php");}
	  else{
  header("location:success.php");
	  }
}
/*else if($count >0 && $adminCount==0){
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  header("location:success.php");
}*/

 else {
  echo 'Wrong Username or Password! Return to <a href="test.html">login</a>';
  }
?>