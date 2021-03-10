<?php
include("db.php");
session_start();
$id=$_GET['id'];
$select=mysqli_query($conn ,"SELECT * FROM products WHERE Id='$id'");

while($row=$select->fetch_object()){

	
    array_push($_SESSION['Product'],$row->Product);
	
	array_push($_SESSION['Price'],$row->Price);
	
	array_push($_SESSION['Id'],$row->Id);
}
$i=0;
while($i<sizeof($_SESSION['Product'])){

echo $_SESSION['Product'][$i] ;
echo sizeof($_SESSION['Product']);
echo $_SESSION['Price'][$i];
$i++;
header("Location: http://localhost/success.php");
}

?>