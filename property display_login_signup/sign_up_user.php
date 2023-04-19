<?php
require('config.php');
?>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$emailaddress = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone_no = mysqli_real_escape_string($link, $_REQUEST['phone']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;
 
// Attempt insert query execution
$sql = "INSERT INTO user (UserPassword, UserName, Email, ContactNumber, Gender, FileName) VALUES ('$password', '$username', '$emailaddress', '$phone_no', '$gender', '$filename')";

mysqli_query($link, $sql);

if(move_uploaded_file($tempname, $folder)){
    echo "Records added successfully.";
    header("location: login.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    //header("location: reset_pass.html");
}
}


?>


<html>
<head>
    <title>Sign Up</title>

        
    <style type="text/css">
        .brand{
            background: #F08080 !important;
        }
        .brand-text{
            color: #F08080 !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 10px;
        }
	   .btn {
        	padding: 12px 20px;
        	border: none;
        	background-color: #008000;
        	color: #fff;
        	cursor: pointer;
        	width: 100%;
        	margin-bottom: 15px;
        	opacity: 0.8;
		text-align: left;
        }
    </style>

</head>
<body>

   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign Up As User</b></div>
				
            <div style = "margin:30px">
    <section class="container">
        <form class="white" action="" method="POST" enctype="multipart/form-data">
            <label><strong>    Create a valid username*       </strong>
            <input type="text" name="username" id = "user_name" required>
            <div class="red-text"></div> <br>

            <label><strong>    Create Password*           </strong>
            <input type="password" name="password" required>
            <div class="red-text"></div> <br>

            <label><strong>    Email Address*         </strong>
            <input type="text" name="email" id="email" required>
            <div class="red-text"></div> <br>

            <label><strong>    Contact Number*      </strong>
            <input type="text" name="phone"  required>
            <div class="red-text"></div> <br>

            <label><strong>    Gender*      </strong>
            <input type="text" name="gender"  required>
            <div class="red-text"></div> <br>

		<div class="mb-3">
		    <label><strong>   Profile Picture*      </strong><br>
		    <input type="file" 
		           class="form-control"
		           name="uploadfile"
                       accept="image/jpg, image/png, image/jpeg">
		</div> <br>

            <div class="center">
             <br>
                <input type="submit" name="Submit" value="Submit" class="btn">
            </div>

	    <a href="login.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Already have user account?</b></a>
                    
        </form>
    </section>
<br>

</body>
</html>