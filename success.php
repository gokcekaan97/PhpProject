<?php
include("db.php");
session_start();


echo ("Welcome " .$_SESSION['username']);


	
if (isset($_POST['upd_submit']))
    {      
    

                                    
                    $username=$_SESSION['username'];
                    $upd_password=$_POST['upd_password'];

         $upd=mysqli_query($conn,"UPDATE members SET password='$upd_password' WHERE username='$username'");
        if($upd){
			echo ("<br/><td>&nbsp;</td>password changed");			
            }
			else echo("error accured");
			
	}
	if (isset($_POST['address_submit']))
    {      
    

                                    
                    $username=$_SESSION['username'];
                    $address=$_POST['upd_address'];

         $upd=mysqli_query($conn,"UPDATE members SET address='$address' WHERE username='$username'");
        if($upd){
			echo ("<br/><td>&nbsp;</td>password changed");			
            }
			else echo("error accured");
			
	}
	/*products*/
	
	if (isset($_POST['search_button'])){
		
		$prd=$_POST['prd_search'];
		$select=mysqli_query($conn ,"SELECT * FROM products WHERE Product='$prd' ");
	}else{
	$select=mysqli_query($conn ,"SELECT * FROM products ORDER BY Id");
	}
	echo "<form name='Update' method='post' action='success.php'>";
echo "<table border='1' cellpadding='10'>";
   echo "<br>product name:<input type='search' name='prd_search' />";
   echo '<input type="submit" name="search_button" value="Search"  /></input>';
   
	echo "<tr><th>ID</th><th>Product</th><th>Type</th><th>Price</th><th></th></tr>";
while($row=$select->fetch_object())/*showing products */
{
	
	echo "<tr>";
	echo"<td>" .$row->Id ."</td>";
	echo"<td>" .$row->Product ."</td>";
	echo"<td>" .$row->Type ."</td>";
	echo"<td>" .$row->Price ."</td>";
	echo "<td><a href='add.php?id=" . $row->Id . "'>Add</a></td>";
    
	echo "</tr>";
}
echo "</table></form>";

	/*Basket*/
	echo "<form name='Update' method='post' action='success.php'>";
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr><<th>Product</th><th>Price</th></tr>";

      $i=0;
	  $all='';
	  $orderedId='';
	  $totalPrice=0;
	while($i<sizeof($_SESSION['Product'])){/*showing items that chosed by customer ,thay added in add.php by making $_SESSION array so 
	                                                                                      we can show all item here easly */
	                                                                     
	echo "<tr>";
	echo"<td>" .$_SESSION['Product'][$i]. "</td>";
	echo"<td>" .$_SESSION['Price'][$i]. "</td>";
	$orderedId=$orderedId. ':' .$_SESSION['Id'][$i];/*putting all array in one String so we can put all data to one row in database*/ 
	$totalPrice+=$_SESSION['Price'][$i];
	$all=$all.':' .$_SESSION['Product'][$i];
	$i++;
	
    
	echo "</tr>";
	
	}
	echo"<td>" .'Total Price'. "</td>";
	echo"<td>" .$totalPrice. "</td>";
	echo '<td><input type="submit" name="verify_button" value="Confirm"  /></input></td>';
	echo "</form>";
	echo "Product Ids".$orderedId;
echo "</table>";
	/*verify*/
	if (isset($_POST['verify_button'])) /*for adding chosed items to database on click so admin who is in charge to deliver can see them in admin_panel */
    {      
   

                                    
                    
                    $username=$_SESSION['username'];
                    
					
					$add='';
                      
         mysqli_query($conn,"INSERT INTO ordered(username,Ids,price,address,status) 
         VALUES ('$username','$orderedId','$totalPrice','$add','0')"); 
		 unset($_SESSION["products"]);
		 
            }
			
?>

<html>
<title>
success

</title>



<head>


</head>
<body>

<form name="Update" method="post" action="success.php">
<div align="left">

  <table id="title">
    
    <tr>
	<h3>Settings</h3>
      <td> Change password:</td>
        <td><input type="password" name="upd_password" /><input type="submit" name="upd_submit" value="Update" /></td>
      </tr>
	  <td> Change Address:</td>
        <td><input type="address" name="upd_address" /><input type="submit" name="address_submit" value="Update" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
        
		
      </tr>
  </table>

</div>
</form>
</body>
</html>
