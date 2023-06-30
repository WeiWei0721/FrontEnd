<?php
error_reporting(0);
session_start(); 

$msg = "";

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;

$db = mysqli_connect("localhost", "root", "mysql", "uploadimage");

if(!$db)
{
	echo "DB Connection Failed";
}

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (AgentRegistrationNo, filename, PropertyID) VALUES ('". $_SESSION['login_user'] ."', '$filename' , '" .$_SESSION['propertyid']. "')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}

// to delete pictures
// $sql = "select * from image";
	
if(isset($_GET['deleteid']))
{
	$querySelect = "select * from image where id = ".$_GET['deleteid']. " and PropertyID = '" .$_SESSION['propertyid']. "' and AgentRegistrationNo = '" .$_SESSION['login_user']. "';";
	$ResultSelectStmt = mysqli_query($db,$querySelect);

	if (!$ResultSelectStmt) {
		echo "Query execution failed: " . mysqli_error($db);
		}
	
	$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);
	
	$fetchImgTitleName = $fetchRecords['filename'];
	
	$createDeletePath = "image/".$fetchImgTitleName;
	
	if(unlink($createDeletePath))
	{
		$liveSqlQQ = "delete from image where id = ".$fetchRecords['id']. " and AgentRegistrationNo = '" .$_SESSION['login_user']. "';";
		$rsDelete = mysqli_query($db, $liveSqlQQ);	
		
		if($rsDelete)
		{
			header('location:pic_upload_index.php?success=true');
			echo "<h3> Successfully deleted image!</h3>";
			exit();
		}
	}
	else
	{
		$displayErrMessage = "Sorry, Unable to delete Image " .$createDeletePath;

	}
	
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$database = "uploadimage";

		$db = mysqli_connect($servername, $username, $password, $database);

		$query = " select * from image where PropertyID = '" .$_SESSION['propertyid']. "' and  AgentRegistrationNo = '" .$_SESSION['login_user']. "';";
		$result = mysqli_query($db, $query);

		if(isset($displayErrMessage))
		{
		?>
			<div class="alert alert-danger">
				<?php 
					echo $displayErrMessage;
					unset($displayErrMessage);
				?>
			</div>
		<?php 
		}
		?>

		<?php 
		if(isset($_GET['success']) && $_GET['success'] == 'true')
		{
		?>
			<div class="alert alert-success">
				<?php 
					echo "Images has been deleted sucessfully";
				?>
			</div>
		<?php 
		}
		?>
		<?php
		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<div>
				<img src="./image/<?php echo $data['filename']; ?>">
				<a href="?deleteid=<?php echo $data["id"]?>" class="btn btn-primary">Delete</a>
			</div>
			
		<?php
		}
		?>
	</div>
</body>

</html>
