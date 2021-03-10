<?php
include("db.php");
session_start();
$username=$_GET['username'];
$delete=mysqli_query($conn,"DELETE FROM ordered WHERE username='$username' AND status='1'");/*if you click delivered message in admin_pal.php it will delete it if its delivered */
$upd=mysqli_query($conn,"UPDATE ordered SET status='1' WHERE username='$username'");/* if you delivered not delivered text make it status 1 and test to delivered*/

		

header("Location: http://localhost/admin_pan.php");


?>