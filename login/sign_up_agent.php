<?php
require('config.php');
?>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($link, $_REQUEST['agent_name']);
    $password = mysqli_real_escape_string($link, $_REQUEST['agent_pw']);
    $emailaddress = mysqli_real_escape_string($link, $_REQUEST['email']);
    $phone_no = mysqli_real_escape_string($link, $_REQUEST['phone']);
    $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
    $regno = mysqli_real_escape_string($link, $_REQUEST['regno']);
    $startdate = mysqli_real_escape_string($link, $_REQUEST['regstart']);
    $enddate = mysqli_real_escape_string($link, $_REQUEST['regend']);
    $agentname = mysqli_real_escape_string($link, $_REQUEST['agentname']);
    $agentlicense = mysqli_real_escape_string($link, $_REQUEST['agentlicense']);
    $filename = $regno.$_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./agent_image/" . $filename;
 
// Attempt insert query execution
$sql = "INSERT INTO agent (AgentPassword, Name, Email, ContactNumber, Gender, RegistrationNo, RegistrationStartDate, RegistrationEndDate, EstateAgentNAme, EstateAgentLicenseNo, FileName) VALUES ( '$password', '$username', '$emailaddress', '$phone_no', '$gender', '$regno', '$startdate', '$enddate', '$agentname', '$agentlicense', '$filename')";

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
   <!-- no session[msg] found in login.php -->

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign Up As Agent</b></div>
				
            <div style = "margin:30px">
    <section class="container">
        <form class="white" action="" method="POST" enctype="multipart/form-data">
            <label><strong>    Create a Valid Name*       </strong>
            <input type="text" name="agent_name" id = "agent_name" required>
            <div class="red-text"></div> <br>

            <label><strong>    Create Password*           </strong>
            <input type="password" name="agent_pw" required>
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

            <label><strong>    Registration No*      </strong>
            <input type="text" name="regno"  required>
            <div class="red-text"></div> <br>

            <label><strong>    Registration Start Date*      </strong>
            <input type="date" name="regstart"  required>
            <div class="red-text"></div> <br>

            <label><strong>    Registration End Date*      </strong>
            <input type="date" name="regend"  required>
            <div class="red-text"></div> <br>

            <label><strong>    Estate Agent Name*      </strong>
            <input type="text" name="agentname"  required>
            <div class="red-text"></div> <br>

            <label><strong>    Agent License*      </strong>
            <input type="text" name="agentlicense"  required>
            <div class="red-text"></div> <br>

		<div class="mb-3">
		    <label><strong>   Profile Picture*      </strong><br>
		    <input 
                type="file" 
                class="form-control"
                name="uploadfile"
                accept="image/jpg, image/png, image/jpeg">
		</div><br>

            <div class="center">
             <br>
                <input type="submit" name="Submit" value="Submit" class="btn">
            </div>

	    <a href="../homepage.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Already have agent account?</b></a>
                    
        </form>
    </section>
<br>

</body>
</html>