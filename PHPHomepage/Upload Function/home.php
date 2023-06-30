<?php 
// Include configuration file 
include_once 'config.php'; 
 
$status = $statusMsg = ''; 
if(!empty($_SESSION['status_response'])){ 
    $status_response = $_SESSION['status_response']; 
    $status = $status_response['status']; 
    $statusMsg = $status_response['status_msg']; 
     
    unset($_SESSION['status_response']); 
} 
?>

<!-- Status message -->
<?php if(!empty($statusMsg)){ ?>
    <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
<?php } ?>

<!-- Upload form -->
<div class="col-md-12">
    <form method="post" action="upload.php" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label>Video File:</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Tags:</label>
            <input type="text" name="tags" class="form-control">
        </div>
        <div class="form-group">
            <label>Privacy:</label>
            <select name="privacy" class="form-control">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-primary" name="submit" value="Upload">
        </div>
    </form>
</div>
