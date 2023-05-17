<?php
include("config.php");

if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $select= 'UPDATE user SET UserPassword='.$pass.' where Email='.$email;
}
?>