<?php  
    $conn = mysqli_connect('localhost', 'root', '',"accaounts");/*connection the is no password*/
     if (!$conn)
    {
     die('Could not connect: ' . mysqli_connect_error());
    }
    
?>