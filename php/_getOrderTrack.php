<?php
session_start();
header('Content-Type: application/json');
require_once("_access.php");
access([1,2,3]);
require_once("dbconnection.php");
$id= $_REQUEST['id'];
$success=0;
try{
  $query = "select tracking.*,status,DATE_FORMAT(date,'%Y-%m-%d') as date,DATE_FORMAT(date,'%H:%i') as hour   from tracking
  left join order_status on tracking.order_status_id = order_status.id
  where order_id=".$id." order by id DESC limit 100";
  $data = getData($con,$query);
  if(count($data) > 0){
  $success="1";
  }
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}
echo json_encode(array("success"=>$success,"data"=>$data));
?>