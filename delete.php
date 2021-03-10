<?php
include("db.php");
$id=$_GET['id'];
$Delete=mysqli_query($conn ,"DELETE FROM members WHERE id='$id'");
?>