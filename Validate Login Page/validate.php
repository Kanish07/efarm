<?php
include("connection.php");//INCLUDE CONNECTION FROM DATABASE CONNECTION
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
  {
   // username and password sent from form 
      $myusername=mysqli_real_escape_string($conn,$_POST['uname']); 
      $mypassword=mysqli_real_escape_string($conn,$_POST['psw']); 
      $sql="SELECT * FROM user_registration WHERE UserName='$myusername' and Password='$mypassword'"; 
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active=$row['active'];
      $count=mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
      if($count==1)
      {
        $_SESSION['username']=$myusername;
        header("location: home.php");
      }
      else 
      {
        header("location: errorlogin.html");
      }
  }
?>