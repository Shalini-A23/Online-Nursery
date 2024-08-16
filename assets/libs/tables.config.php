<?php

include_once("db.config.php");
$PREFIX=DB_PREFIX;

defined('TBL_ADMIN') ? null : define('TBL_ADMIN',$PREFIX.'admin' );
defined('TBL_DELIVERY_ADMIN') ? null : define('TBL_DELIVERY_ADMIN',$PREFIX.'delivery_admin' );
defined('TBL_BLOG') ? null : define('TBL_BLOG',$PREFIX.'blog' );
defined('TBL_CATEGORY') ? null : define('TBL_CATEGORY',$PREFIX.'category' );
defined('TBL_ORDER') ? null : define('TBL_ORDER',$PREFIX.'order' );
defined('TBL_TRANSACTION') ? null : define('TBL_TRANSACTION',$PREFIX.'transaction' );
defined('TBL_PRODUCT') ? null : define('TBL_PRODUCT',$PREFIX.'product' );
defined('TBL_QUERY') ? null : define('TBL_QUERY',$PREFIX.'query' );
defined('TBL_QUERY_REPLY') ? null : define('TBL_QUERY_REPLY',$PREFIX.'query_reply' );
defined('TBL_REVIEW') ? null : define('TBL_REVIEW',$PREFIX.'review' );
defined('TBL_USER') ? null : define('TBL_USER',$PREFIX.'user' );
defined('TBL_WISHLIST') ? null : define('TBL_WISHLIST',$PREFIX.'wishlist' );
defined('TBL_FEEDBACK') ? null : define('TBL_FEEDBACK',$PREFIX.'feedback' );
?>
