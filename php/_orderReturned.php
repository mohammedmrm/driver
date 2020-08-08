<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
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
  $x=(bool) 0;
  if(preg_match("/^(0|\d*)(\.\d{2})?$/",$value)){
    if($value > 0){
       if(preg_match("/(000|500|250|750)$/",$value)){
         $x=(bool) 1;
       }
    }else{
        $x=(bool) 1;
    }
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
    'new_price'  => [$new_price,'isPrice'],
    'items_no'   => [$items_no,'required|int'],
    'note'       => [$note,     'max(250)'],
    'order_id'   => [$order_id, "required|int"],
]);

if($v->passes()) {

   $sql = 'update orders set order_status_id =?,new_price=? where id=? and driver_id=? and driver_invoice_id=0';
   $result = setData($con,$sql,['6',$new_price,$order_id,$id]);
   if($result > 0){
    $success = 1;
    $sql = 'insert into tracking (order_status_id,note,order_id,items_no,staff_id) values(?,?,?,?,?)';
    $result = setData($con,$sql,['6',$note,$order_id,$items_no,$_SESSION['userid']]);
    $sql = "select staff.token as s_token, clients.token as c_token from orders inner join staff
            on staff.id = orders.manager_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
    $res =getData($con,$sql,[$order_id]);
    sendNotification([$res[0]['s_token'],$res[0]['c_token']],[$order_id],'طلب رقم ',"ارجاع الطلب - ".$note,"../orderDetails.php?o=".$order_id);

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