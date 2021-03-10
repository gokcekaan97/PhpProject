<html>
<head>
<title>Register</title>
</head>
<body>
<form action="signup.php" method ="POST" name="register">
  <table id="title">
    
    
    <tr>
      <td>Email:</td>
        <td><input type="text" name="email" /></td>
      </tr>
    <tr>
      <td>Username:</td>
        <td><input type="text" name="username" /></td>
      </tr>
    <tr>
      <td>Password:</td>
        <td><input type="password" name="password" /></td>
      </tr>
	  <td>Address:</td>
        <td><input type="text" name="address" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
        <td><input type="submit" name="register_form" value="Sign Up" /></td>
      </tr>
  </table>
</div>
</form>

<?php
if (isset($_POST['register_form']))/*for regiter taking values from test.html with $_post method */
    {      
    include 'db.php';

                                    
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
         mysqli_query($conn,"INSERT INTO members(username,password,email,address) 
         VALUES ('$username','$password','$email','$address')"); 
            }
?>
