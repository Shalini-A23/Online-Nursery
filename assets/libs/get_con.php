<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
		
	$stmt = "SELECT * from `".TBL_STATE."` where country_id=$id";
    
	$result = $database->query( $stmt );
	?>
	
	<option value="">Select State / Province</option>
	
	<?php
	while($row = $database->fetch_array( $result ))
	{
		?>
        	
			<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php
	}

?>