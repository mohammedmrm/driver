<?php
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("_sendNoti.php");
require_once("_httpRequest.php");


use Violin\Violin;
require_once('../validator/autoload.php');
$v = new Violin;


$success = 0;
$error = [];
$message  = $_REQUEST['message'];
$order_id = $_REQUEST['orderid'];


$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
]);

$v->validate([
    'message'    => [$message,    'required|min(1)|max(500)'],
    'order_id'   => [$order_id,    'required|int'],
]);

if($v->passes()) {
  try{
  $sql = 'insert into message (message,order_id,from_id,is_client) values (?,?,?,?)';
  $result = setData($con,$sql,[$message,$order_id,$userid,1]);
  if($result > 0){
    $sql = "select staff.token as s_token, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id = ?";
    $res =getData($con,$sql,[$order_id]);
    $f= sendNotification([$res[0]['s_token'],$res[0]['c_token']],[$order_id],'رساله جديد ',$message,"../orderDetails.php?o=".$order_id);
    $success = 1;
           //--- snyc
           $sql = "select
                   isfrom ,
                   clients.sync_token as token,
                   clients.sync_dns as dns,
                   orders.id as id,
                   orders.remote_id as remote_id
                   from orders
                   inner join clients on clients.id = orders.client_id
                   where orders.id=?";
           $order = getData($con,$sql,[$order_id]);
           if($order[0]['isfrom'] == 2 && $order[0]['remote_id'] > 1){
             $response = httpPost($order[0]['dns'].'/api/shareMessageToClient.php',
                  [
                   'token'=>$order[0]['token'],
                   'message'=>$message,
                   'barcode'=>$order[0]['id'],
                   'id'=>$order[0]['remote_id'],
              ]);
           }else{
             $sql = "select
                     companies.token as token,
                     companies.dns as dns, orders.id as id,
                     orders.bar_code as bar_code
                     from orders
                     left join companies on orders.delivery_company_id = companies.id
                     where orders.id=?";
             $order = getData($con,$sql,[$order_id]);
             $response = httpPost($order[0]['dns'].'/api/shareMessageToCompany.php',
                  [
                   'token'=>$order[0]['token'],
                   'message'=>$message,
                   'remote_id'=>$order[0]['id'],
                   'id'=>$order[0]['bar_code'],
              ]);
           }
    }
}catch(PDOException $ex) {
       $data=["error"=>$ex];
       $success="0";
       $msg ="Query Error";
}
}else{
  $error = [
           'message'=> implode($v->errors()->get('message')),
           'orderid'=>implode($v->errors()->get('order_id')),
           ];
  $msg ="Request Error";
}
ob_end_clean();
echo json_encode(['code'=>200,'message'=>$msg,'success'=>$success,'error'=>$error,$f]);
?>