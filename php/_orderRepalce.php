<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require_once("_sendNoti.php");
use Violin\Violin;
require_once('../validator/autoload.php');
$v = new Violin;
$success = 0;
$error = [];
$id        = $_SESSION['userid'];
$new_price = $_REQUEST['new_price'];
$note      = $_REQUEST['note'];
$items_no  = $_REQUEST['items_no'];
$order_id  = $_REQUEST['id'];

$v->addRuleMessage('isPrice', 'المبلغ غير صحيح');

$v->addRule('isPrice', function($value, $input, $args) {
  if(preg_match("/^(0|[1-9]\d*)(\.\d{2})?$/",$value)){
    $x=(bool) 1;
  }
  return   $x;
});
$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'regex'    => 'فقط الارقام مسموح بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
    'email'    => 'البريد الالكتروني غيز صحيح',
]);

$v->validate([
    'id'         => [$id,       'required|int'],
    'new_price'  => [$new_price,'required|isPrice'],
    'items_no'   => [$items_no,'required|int'],
    'note'       => [$note,     'max(250)'],
    'order_id'   => [$order_id, "required|int"],
]);
  $error = [
           'id'=> "",
           'note'=> "",
           'new_price'=>"",
           'items_no'=>"",
           'order_id'=>"",
           ];
if($v->passes()) {

   $sql = 'update orders set order_status_id =?,new_price=? where id=?';
   $result = setData($con,$sql,['5',$new_price,$order_id]);
   if($result > 0){
    $success = 1;
    $sql = 'insert into tracking (order_status_id,note,order_id,items_no,staff_id) values(?,?,?,?,?)';
    $result = setData($con,$sql,['5',$note,$order_id,$items_no,$_SESSION['userid']]);
    $sql = "select staff.token as s_token, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
    $res =getData($con,$sql,[$order_id]);
    sendNotification([$res[0]['s_token'],$res[1]['s_token'],$res[0]['c_token']],[$order_id],'طلب رقم - '.$order_id,"تبديل الطلب - ".$note,"../orderDetails.php?o=".$order_id);

   }else{
     $error['note'] = "لايمكن تحديث الحالة";
   }


}else{
  $error = [
           'id'=> implode($v->errors()->get('id')),
           'note'=> implode($v->errors()->get('note')),
           'new_price'=>implode($v->errors()->get('new_price')),
           'items_no'=>implode($v->errors()->get('items_no')),
           'order_id'=>implode($v->errors()->get('order_id')),
           ];
}
echo json_encode(['success'=>$success, 'error'=>$error,$_POST]);
?>