<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db;
if(!isset($_SESSION['admin_id']))
{
    header('Location: login.php');
}
?>
<?php
$id = $_POST['rowid'];
$query = "SELECT * FROM `".TBL_PRODUCT."` WHERE id = '".$id."' ";
$result = $database->query($query);
$row = $database->fetch_array($result);
?>
<div class="modal-header">
    <h4 class="modal-title">Edit Stock Details</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <form action="product_action.php" method="post">
        <div class="form-group">
            <label for="recipient-name" class="control-label">Product Name:</label>
            <input type="text" class="form-control" value="<?php echo $row['product_name'] ?>" readonly>
            <input type="hidden" value="<?php echo $_POST['rowid'] ?>" name="id" id="product_id">
        </div>
        <div class="form-group">
            <label for="message-text" class="control-label">Stock:</label>
            <input type="text" id="stock" class="form-control" name="stock" pattern="[0-9]+" placeholder="<?php echo $row['stock'] ?>" required=""> 
        </div>
        <div class="form-group" style="text-align: right">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="save_stock" name="save_stock">Submit</button>
        </div>
    </form>
</div>