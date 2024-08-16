<?php

/* 
 * News magazine
 *  
 */
include_once "class.database.php";

class Emp_Authendicate
{
    protected static $table_name = TBL_ADMIN;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( $password);
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
                    
                	//print_r($sql);
//EXIT;					
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $sql;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = $pass;
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
class Emp_Authendicate1
{
    protected static $table_name = TBL_ADMIN;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
                    
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}class Emp_Authendicate2
{
    protected static $table_name = TBL_CLINIC_USER;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
          
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
class Emp_Authendicate_Insurance
{
    protected static $table_name = TBL_INSURANCE_USER;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
          
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
class Emp_Authendicate_Lboratory
{
    protected static $table_name = TBL_LABORATORY_USER;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
          
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
class Emp_Authendicate_Pharmacy
{
    protected static $table_name = TBL_PHARMACY_USER;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
          
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
class Emp_Authendicate_Admin
{
    protected static $table_name = TBL_ADMIN;
    function __construct(){
        
    }
    public static function authenticate( $username='', $password='' )
        {
                global $database, $db;
			$username = $database->escape_value($username);
/* @var $password type */
			$password = $database->escape_value( md5($password) );
			$sql  = "SELECT * FROM ".self::$table_name;
			$sql .= " WHERE email = '{$username}' ";
			$sql .= " AND password = '{$password}' ";
                        $sql .= " AND status=1 ";
                      //  $sql .= " AND oto_is_active='y' ";
          
                        
                        
                        //return $sql;
                        //echo $sql;
			$result_array = self::find_by_sql($sql);
                        return $result_array;
			//return !empty($result_array) ? array_shift($result_array) : false;
                       
        }
       public static function hashPassword($pass='')
	{
	/*
	* this function hash the password or it been used for hash the file.
	* @ $pass
	*/
		$pass = md5($pass);
		return $pass;
	}
        public static function find_by_sql ( $sql="" )
		{
		/*
		* find records and but then into veriables
		*/
			global $database, $db;
			$result = $database->query( $sql );
			$object_array = array();
                        $object_array=$database->fetch_array($result);
//			while ($row = $database->fetch_array($result)) 
//			{
//				$object_array[] = self::instantiate($row);
//			}
			return $object_array;
		}
}
