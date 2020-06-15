<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require_once("_sendNoti.php");
$id = $_SESSION['userid'];
$order_id = $_REQUEST['id'];
$note = $_REQUEST['note'];
use Violin\Violin;
require_once('../validator/autoload.php');
$v = new Violin;
$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
]);

$v->validate([
    'id'         => [$id,     'required|int'],
    'note'    => [$note,'required|max(250)'],
    'order_id'   => [$order_id,"required|int"],
]);

if($v->passes()) {

   $sql = 'update orders set order_status_id =? where id=? and driver_id=?';
   $result = setData($con,$sql,['7',$order_id,$id]);
   if($result > 0){
    $success = 1;
    $sql = 'insert into tracking (order_status_id,note,order_id,staff_id) values(?,?,?,?)';
    $result = setData($con,$sql,['7',$note,$order_id,$_SESSION['userid']]);
    $sql = "select staff.token as s_token, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
    $res =getData($con,$sql,[$order_id]);
    sendNotification([$res[0]['s_token'],$res[1]['s_token'],$res[0]['c_token']],[$order_id],'طلب رقم - '.$order_id,"تأجيل الطلب -" .$note,"../orderDetails.php?o=".$order_id);

   }else{
     $error['note'] = "لايمكن تحديث الحالة";
   }


}else{
  $error = [
           'id'=> implode($v->errors()->get('id')),
           'note'=> implode($v->errors()->get('note')),
           'order_id'=>implode($v->errors()->get('order_id')),
           ];
}
echo json_encode(['success'=>$success, 'error'=>$error,$_POST]);
?>