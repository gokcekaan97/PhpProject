<?php
include("db.php");
echo("welcome admin");
$select=mysqli_query($conn ,"SELECT * FROM members ORDER BY id");/*for showing users and editing their account */
$order=mysqli_query($conn ,"SELECT * FROM ordered ORDER BY status"); /*ordered foods and drinks ordered by status so first not delivered will show */
echo "<table border='1' cellpadding='10'>";
	echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>email</th><th></th></tr>";
while($row=$select->fetch_object())
{
	
	echo "<tr>";
	echo"<td>" .$row->id ."</td>";
	echo"<td>" .$row->username ."</td>";
	echo"<td>" .$row->password ."</td>";
	echo"<td>" .$row->email ."</td>";
	
    echo "<td><a href='delete.php?id=" . $row->id . "'>Delete</a></td>";/*for deleting accounts*/
	echo "</tr>";
	
}

echo "<table border='1' cellpadding='10'>";
	echo "<tr><th>Customer</th><th>productIds</th><th>TotalPrice</th><th>address</th><th>status</th><th>individual Price</th></tr>";
	$items='';
echo "<h3>Ordered Items</h3>"; 
while($row1=$order->fetch_object())
	
{
	
	echo "<tr>";
	echo"<td>" .$row1->username ."</td>";
	$productIds=$row1->Ids;
	$productIds=explode(':',$productIds); /*before puttin databese changed array to String now doing reverse so we can pick Id s and make double check
	                                         for total price in admin too */                                      
	                                            
	$i=1;
	echo "<td>";
	while($i<sizeof($productIds)){
    echo $productIds[$i]." ";
	$i++;
	}
	echo "</td>";
	echo"<td>" .$row1->price ."</td>";
	echo"<td>" .$row1->address ."</td>";
	if($row1->status=='1'){/*shwoing statusof item if delivered or not o means not 1 means delivered*/
		$status='delivired';
	}else{$status='not delivered';}
	echo "<td><a href='delivired.php?username=" . $row1->username . "'>" . $status. "</a></td>";/* putting id to address so we can get that with $_GET[] later and do things */
	echo "<td>";
	for($i=1;$i<sizeof($productIds);$i++){/*starting from 1 because firt element null*/
$pro=mysqli_query($conn ,"SELECT * FROM products WHERE Id='$productIds[$i]'");
$proo=$pro->fetch_object();

$items=$proo->Product."=".$proo->Price;
echo $items;
}
echo"</td>";	
	echo "</tr>";
	
}
echo "</table>";
	

?>