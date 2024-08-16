<?php

//fetch_data.php

error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 

if(isset($_POST["action"]))
{
 $query = "SELECT * FROM `".TBL_PRODUCT."` WHERE status = '1'";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
  if(isset($_POST["minimum_discount"], $_POST["maximum_discount"]) && !empty($_POST["minimum_discount"]) && !empty($_POST["maximum_discount"]))
 {
  $query .= "
   AND discount BETWEEN '".$_POST["minimum_discount"]."' AND '".$_POST["maximum_discount"]."'
  ";
 }
  if(isset($_POST["search"]) && !empty($_POST['search']))
 {
  $query .= "AND product_name LIKE '%".$_POST['search']."%' ";
 }
 if(isset($_POST["category"]))
 {
  $category_filter = implode("','", $_POST["category"]);
  $query .= "AND category_id IN('".$category_filter."')";
 }
 if(isset($_POST["sort"]) && !empty($_POST['sort']))
 {
  if($_POST['sort']=='asc' || $_POST['sort']=='desc')
  {
    $query .= "ORDER BY product_name ".$_POST['sort']." ";
  }
  else
  {
    $query .= "ORDER BY ROUND(price-(discount*price)/100) ".$_POST['sort']." ";
  }
 }
$result = $database->query($query);
$results_per_page=9;
$total_row = mysqli_num_rows($result);
$number_of_page = ceil ($total_row / $results_per_page); 
if (!isset ($_GET['page']) ) 
{  
  $page = 1;  
} 
else 
{  
  $page = $_GET['page'];  
} 
$page_first_result = ($page-1) * $results_per_page;
//echo $page_first_result;
//echo $number_of_page;
 if($total_row > 0)
 {
  $a=1;
  while($row = $database->fetch_array($result))
  {
   $output .= '
   <!--Single List Product Start-->
   <div class="product-list-item mb-40">
    <div class="row">
    <div class="col-md-4">
      <div class="single-product">
        <div class="product-img img-full">
          <a href="single-product.php?id='.$row['id'].'">
            <img src="admin/uploads/'.$row['image'].'" alt="">
          </a>';
          if($row['discount']!='0'){
  $output.=' <span class="onsale">'.$row['discount'].'%</span>'; }
  if($row['discount']=='0'){
  $output.=' <span class="onsale">Sale</span>'; }
  $output.= ' </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="product-content shop-list">
        <h2><a href="single-product.php&id='.$row['id'].'">'.$row['product_name'].'</a></h2>
          <div class="single-product-reviews">';
                          
                         $sel3="SELECT SUM(rating)/COUNT(rating) FROM `".TBL_REVIEW."` WHERE product_id='".$row['id']."' ";
                          $result3 = $database->query( $sel3 );
                          while($row3=$database->fetch_array($result3))
                          {
                                if($row3[0]!='0')
                                {
                                  $i=$row3[0];
                                  if(number_format((float)$row3[0],1,'.','')=='0.0')
                                  {
                                    echo "";
                                  }else
                                  {
                                    $output.=' <span>'.number_format((float)$row3[0],1,'.','').'</span>';
                                  }
                                }
                                if($row3[0]!=null)
                                {
                                  $z=(int)$row3[0];
                                  for($j=1;$j<=$z;$j++) 
                                  {
                                    $output.='    <i class="fa fa-star"></i>';
                                   
                                  }
                                  $b=5-$z;
                                  $x=$row3[0]-$z;
                                  if($b!=0)
                                  {
                                    if($x==0)
                                    { for($i=0;$i<$b;$i++){ 
                                      $output.='   <i class="fa fa-star-o"></i>';
                                      }
                                    }else
                                    { 
                                      $output.='   <i class="fa fa-star-half-o"></i>';
                                   
                                    } 
                                  }
                                }
                                else
                                {
                                  for($j=1;$j<=5;$j++) 
                                  {
                                  $output.=' <i class="fa fa-star-o"></i>';
                                  
                                  }
                                }
                            } 
                                $sel11="SELECT COUNT(*) FROM `".TBL_REVIEW."` where review!='' AND product_id='".$row['id']."' ";
                                $result11 = $database->query( $sel11 );
                                $row11=$database->fetch_array($result11);
                                
                                if($row11[0]!='0'){ 
                          $output.='      <a class="review-link" href="#open">('.$row11[0].' customer review)</a>';
                                 } 
                                if(number_format((float)$i[0],1,'.','')==0.0)
                                  {
                              $output.='    <span style="color: grey">(No review)</span>';
                                   } 
                          $output.='  </div>
          <div class="product-description">
            <p>'.$row['product_description'].'</p>
          </div>
          <div class="product-price">
            <div class="price-box">';
  if($row['discount']!='0'){
  $output .= '<span class="price">&#8377;'. $row['price'] .'</span>'; }

  $output .= '<span class="regular-price">&#8377;'. ($row['price']-($row['discount']*$row['price'])/100) .'</span>
            </div>         
          </div>
          <div class="product-list-action">';
            if($row['stock']!='0'){
    $output .= '<div class="add-btn">
             <a href="shop_action.php?id='.$row['id'].'&add=1">Add To Cart</a>
            </div>';
            }else{ 
 $output .= '<div class="add-btn">
             <a style="color: red; background-color:white; font-weight: bold"><i class="fa fa-close">Out of Stock</i></a>
            </div>';
            } 
 $output .= '<ul>
              <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="'.$row['id'].'"><i class="fa fa-search"></i></a></li>
              <li>';
  $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row['id']."' AND tbl_wishlist.product_id='".$row['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
  $result1 = $database->query($query1);
  $row1 = $database->fetch_array($result1);
    if($row1['product_id']!=null)
    {
      $output.='<a href="shop_action.php?remove_wishlist=1&id='.$row['id'].'&page=/plant-more.com/shop.php" title="Whishlist"><i class="fa fa-heart"></i></a>';
    }
    else
    {
      $output.='<a href="shop_action.php?wishlist=1&id='.$row['id'].'&page=/plant-more.com/shop.php" title="Whishlist"><i class="fa fa-heart-o"></i></a>';
    }

    $output.='</li>
              <li><a href="compare.php?compare_id='.$row['id'].'" title="Compare"><i class="fa fa-refresh"></i></a></li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</div>
    <!--Single List Product End-->
   ';
   
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}
?>

