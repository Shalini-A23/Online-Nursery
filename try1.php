<?php 
$page_id="blog";
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 
?>
<html>  
<head>  
<title> Pagination </title>  
</head>  
<body>  
  
<?php  
  
  
    //define total number of results you want per page  
    $results_per_page = 10;  
  
    //find the total number of results stored in the database  
    $query = "select * from `".TBL_PRODUCT."`";  
    $result = $database->query($query);  
    $number_of_result = mysqli_num_rows($result); 
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT * FROM `".TBL_PRODUCT."` LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = $database->query($query);  
      
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) {  
        echo $row['id'] . ' ' . $row['product_name'] . '</br>';  
    }  
  
  
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "try1.php?page=' . $page . '">' . $page . ' </a>';  
    }  
  
?>  
</body>  
</html> 