<?php
class trust
{

function state_id($id)
{
 global $database, $db;
         $qry="SELECT `city_state`  FROM `".TBL_CITIES."` WHERE `city_id` = '".$id."' ";
        
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['city_state'];
}

function city_name($id)
{
 global $database, $db;
         $qry="SELECT `city_name`  FROM `".TBL_CITIES."` WHERE `city_id` = '".$id."' ";
        
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['city_name'];
}

function state_name($id)
{
 global $database, $db;
         $qry="SELECT `city_id`  FROM `".TBL_CITIES."` WHERE `city_state` = '".$id."' ";
        
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['city_state'];
}    
function state_det()
{

 global $database, $db;
        $qry="SELECT distinct(`city_state`)  FROM `".TBL_CITIES."` ";
        
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}
function cities_det($name)
{
 global $database, $db;

// $name = trust::state_name($name);
        $qry="SELECT `city_name` , `city_id` FROM `".TBL_CITIES."` where `city_state`='".$name."' ";
        echo $qry;
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}

function date($date)
{
    
    $newDate = date("Y-m-d", strtotime($date));
        return $newDate;
}

function district_name($date)
{
    
 global $database, $db;
    $qry="SELECT `val` FROM `tbl_district` WHERE `sno` = '".$date."'";
    $result = $database->query( $qry );
    $row = $database->fetch_array($result);
    return $row['val'];
}
 
function get_date($date)
{
    if(!empty($date))
    {
    $newDate = date("d-m-Y", strtotime($date));
    }else
    {$newDate = "";}
    
        return $newDate;
}

function get_date_name($date)
{
    if(!empty($date))
    {
    $newDate = date("d-M", strtotime($date));
    }else
    {$newDate = "";}
    
        return $newDate;
}
function user_id($name)
{

 global $database, $db;
        $qry="SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['id'];
}
function emp_id($name)
{

 global $database, $db;
        $qry="SELECT `id` FROM `".TBL_ADMIN."` WHERE `email` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['id'];
}
function user_email($name)
{

 global $database, $db;
        $qry="SELECT `email` FROM `".TBL_ADMIN."` WHERE `id` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['email'];
}
function job_user($name,$id)
{

 global $database, $db;
        $qry="SELECT `id` FROM `".TBL_ENQUIRY."` WHERE `user_id` = '".$name."' AND `job_id` = '".$id."' ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function fetch_data(){

    $id=1;
    $sel="SELECT * FROM `".TBL_STUDENT."` WHERE `id` = '".$id."'";
    $result = $database->query( $sel );
    $row = $database->fetch_array($result);
    return $row;
}
function country_name($name)
{

 global $database, $db;
        $qry="SELECT `id` FROM `".TBL_COUNTRY."` WHERE `name` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row;
}

function country_det()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_COUNTRY."`";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}

function enquiry_det($id)
{

 global $database, $db;
        $sel="SELECT * FROM `".TBL_ENQUIRY."` WHERE `id` = '".$id."'  ";
        $result = $database->query($sel);   
        $row = $database->fetch_array($result);
        return $row;
}

function enquiry_det_job($id)
{

 global $database, $db;
        $sel="SELECT `job` FROM `".TBL_ENQUIRY."` WHERE `id` = '".$id."'  ";
        $result = $database->query($sel);   
        $row = $database->fetch_array($result);
        return $row['job'];
}

function job_name_search($n)
{

 global $database, $db;
        $qry="SELECT `name` FROM `".TBL_JOB."` WHERE `status` = 1 AND name LIKE '%".$n."%'";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['name']);
        }
        // array_unique($final);
        return $final;
}

function job_loc_search($n)
{

 global $database, $db;
        $qry="SELECT `location` FROM `".TBL_JOB."` WHERE `status` = 1 AND location LIKE '%".$n."%'";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['location']);
        }
        // array_unique($final);
        return $final;
}

function job_10()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB."` WHERE `status` = 1 LIMIT 5 ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}

function job_related($cat , $id)
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB."` WHERE `id` <> '".$id."' AND `category` = '".$cat."' AND `status` = 1 LIMIT 3 ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}


function job_name($id)
{

 global $database, $db;
        $qry="SELECT `name` FROM `".TBL_JOB."` WHERE `id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['name'];
}


function cat_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(category) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['category']);
        }
        array_unique($final);
        return $final;
}

function cat_det_index()
{

 global $database, $db;
        $qry="SELECT distinct(category) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['category']);
        }
        $final = implode(",", $final);
        $qry="SELECT * FROM `".TBL_CATEGORY."` WHERE `id` IN (".$final.") ";
        $result = $database->query( $qry );     
        return $result;
}


function type_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(type) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            $exp = explode(',', $row['type']);
            $final=array_merge($final,$exp);
        }
        $final=array_unique($final);
        return $final;
}

function exp_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(exp) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            $exp = explode(',', $row['exp']);
            $final=array_merge($final,$exp);
        }
        $final=array_unique(array_filter($final));
        return $final;
}

function qualify_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(edu) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            $exp = explode(',', $row['edu']);
            $final=array_merge($final,$exp);
        }
        $final=array_unique($final);
        return $final;
}

function con_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(location) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['location']);
        }
        return $final;
}

function gen_det_j()
{

 global $database, $db;
        $qry="SELECT distinct(gender) FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
                 $final=[];
        while($row = $database->fetch_array($result))
        {
            array_push($final,$row['gender']);
        }
        // array_unique($final);
        return $final;
}
function company_details($id)
{
    global $database, $db;
    
    $qry="SELECT * FROM `".TBL_ADMIN."` WHERE `status` = 1 and `id`='".$id."' ";
    $result = $database->query( $qry );
    $row = $database->fetch_array($result);

    $sel="SELECT * FROM `".TBL_USER."` WHERE `status` = 1 and `email`='".$row['email']."' ";
    $result_com = $database->query( $sel );
    $row_com = $database->fetch_array($result_com);
    return $row_com;
}
function anouncement()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_ANOUNCE."` WHERE `status` !=0 ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function scholarship()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_STUDENT."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function users()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_USER."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function employees()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB_SEARCH."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function posted_jobs($email)
{

 global $database, $db;

      $id = trust::user_id($email);

        $qry="SELECT * FROM `".TBL_JOB."` WHERE `created_by` = '".$id."' ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}
function enquiry_count_com($email)
{

 global $database, $db;

        $sel="SELECT * FROM `".TBL_ADMIN."` WHERE  `email`='".$email."' ";
        $result_sel = $database->query( $sel );
        $row = $database->fetch_array( $result_sel );

        $qry="SELECT * FROM `".TBL_USER."` WHERE `admin_id` = '".$row['id']."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array( $result );
        $qry="SELECT * FROM `".TBL_JOB."` WHERE `created_by` = '".$row['id']."' ";
        $result = $database->query( $qry );
        while($row_qry = $database->fetch_array( $result ))
        {
        $qry_sel="SELECT * FROM `".TBL_ENQUIRY."` WHERE `job_id` = '".$row_qry['id']."' ";
        $result_qry_sel = $database->query( $qry_sel );
        $num1 = $database->num_rows($result_qry_sel);
        $num=$num+$num1;
        }
        if($num > 0)
        return $num;
        else
        return 0;
}
function enquiry_list($id)
{

 global $database, $db;


        $qry="SELECT * FROM `".TBL_JOB_SEARCH."` WHERE `admin_id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array( $result );
        return $row;
}

function get_job_list($id)
{

 global $database, $db;

        $qry="SELECT * FROM `".TBL_JOB."` WHERE `created_by` = '".$id."' ";
        $result = $database->query( $qry );
        $arr=[];
        while($row = $database->fetch_array( $result ))
        {
            array_push($arr,$row['id']);
        }
        return $arr;
}
function user_det($id)
{
 global $database, $db;

    
        $qry="SELECT * FROM `".TBL_JOB_SEARCH."` WHERE `admin_id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array( $result );
        return $row;
}
function job_det($name)
{

global $database, $db;
       $qry="SELECT * FROM `".TBL_JOB."` WHERE `id` = '".$name."'";
       $result = $database->query( $qry );
       $row = $database->fetch_array($result);
       return $row;
}

function company_det($name)
{

global $database, $db;
       $qry="SELECT * FROM `".TBL_USER."` WHERE `id` = '".$name."'";
       $result = $database->query( $qry );
       $row = $database->fetch_array($result);
       return $row;
}
function enquiry_count_table($id)
{

 global $database, $db;

        $qry_sel="SELECT * FROM `".TBL_ENQUIRY."` WHERE `job_id` = '".$id."' ";
        $result_qry_sel = $database->query( $qry_sel );
        $num = $database->num_rows($result_qry_sel);
        return $num;
}
function type_det()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_TYPE."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}   
function type_name($id)
{

 global $database, $db;
        $qry="SELECT `type` FROM `".TBL_TYPE."` WHERE `id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['type'];
}
function loc_det()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_LOC."`  ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}
function loc_name($id)
{

 global $database, $db;
        $qry="SELECT `city_name` FROM `".TBL_CITIES."` WHERE `city_id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['city_name'];
}
function com_name($id)
{

 global $database, $db;
        $qry="SELECT `name` FROM `".TBL_USER."` WHERE `id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['name'];
}


function exp_det()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_EXP."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}

function exp_name($id)
{

 global $database, $db;
        $qry="SELECT `exp` FROM `".TBL_EXP."` WHERE `id` = '".$id."' ";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['exp'];
}

function qual_det()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_QUALIFY."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        // $row = $database->fetch_array($result);
        return $result;
}

function qualify_name($id)
{

 global $database, $db;
        $qry="SELECT `qualify` FROM `".TBL_QUALIFY."` WHERE `id` IN (".$id.") ";
        $result = $database->query( $qry );
        while($row = $database->fetch_array($result))
        {
            $res = $res.','.$row['qualify'];
        }
        $res = explode(',',$res);

        return implode(',', array_filter($res));
}


function job_user_list($created_by)
{

 global $database, $db;
        $sel="SELECT * FROM `".TBL_JOB."` WHERE `created_by` = '".$created_by."'  ";
        $result = $database->query( $sel );
        $num = $database->num_rows($result);
        return $num;
}

function comp_name($created_by)
{

 global $database, $db;
        $sel="SELECT `name` FROM `".TBL_USER."` WHERE `id` = '".$created_by."'  ";
        $result = $database->query( $sel );
        $row = $database->fetch_array($result);
        return $row['name'];
}

function resume_name($name)
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB_SEARCH."` WHERE `admin_id` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['resume'];
}
function community_name($name)
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB_SEARCH."` WHERE `admin_id` = '".$name."'";
        $result = $database->query( $qry );
        $row = $database->fetch_array($result);
        return $row['community'];
}

function applied_count($name)
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_ENQUIRY."` WHERE `user_id` IN (".$name.") ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        return $num;
}

function job_count()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_JOB."` WHERE `status` = 1 ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        // $row = $database->fetch_array($result);
        return $num;
}
          
function enquiry_count()
{

 global $database, $db;
        $qry="SELECT * FROM `".TBL_ENQUIRY."` ";
        $result = $database->query( $qry );
        $num = $database->num_rows($result);
        // $row = $database->fetch_array($result);
        return $num;
}
}
?>