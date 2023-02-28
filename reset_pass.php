<?php 
include("config.php");
session_start();
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<div class="wrapper" style="width: 35%; margin: 0 auto;">
<form class="form-signin" action='handler.php' method="post">       
<h2 class="form-signin-heading">Forgot Password</h2><br/>
<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
<br/>
<input type="password" class="form-control" name="newpassword" placeholder="New Password" required=""/><br/>
<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm New Password" required=""/>
<br/>
<button class="btn btn-small btn-primary btn-block" type="submit">Submit</button>   
<input type="hidden" name="object" value="forgot"/>
</form>
</div>