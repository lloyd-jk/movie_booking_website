<?php

$conn = mysqli_connect('localhost','root','','project');

    if(!$conn){
        echo 'Connection error'.mysqli_connect_error();
    }

if (isset($_POST['create'])){     
    $name=mysqli_real_escape_string($conn,$_REQUEST['name']);
    $username=mysqli_real_escape_string($conn,$_REQUEST['username']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['password']);
    $password2=mysqli_real_escape_string($conn,$_REQUEST['password2']);


    $sql = "INSERT INTO login (name,username,password) VALUES('$name','$username','$password')";

    if(!(mysqli_query($conn,$sql))){
        echo mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html>
   <head>
      <title>HTML Meta Tag</title>
      <meta http-equiv = "refresh" content = "2; url = index.html" />
   </head>
   <body>
      <p>Creating a new account...</p>
   </body>
</html>
