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


use Violin\Violin;

require_once('../validator/autoload.php');
$v = new Violin;
$success = 0;
$error = [];
$id        = $userid;
$new_price = str_replace(',', '', $_REQUEST['price']);
$new_price = str_replace('.', '', $new_price);
$note      = $_REQUEST['note'];
$order_id  = $_REQUEST['orderid'];
$msg = "";
$v->addRuleMessage('isPrice', 'المبلغ غير صحيح');

$v->addRuleMessage('isPrice', 'المبلغ غير صحيح');

$v->addRule('isPrice', function ($value, $input, $args) {
  $x = (bool) 0;
  if (preg_match("/^(0|\-\d*|\d*)(\.\d{2})?$/", $value) || $value == 0) {
    if ($value != 0) {
      $x = (bool) 1;
    } else {
      $x = (bool) 1;
    }
  }
  return   $x;
});
$v->addRuleMessages([
  'required' => 'الحقل مطلوب',
  'int'      => 'فقط الارقام مسموع بها',
  'regex'    => 'فقط الارقام مسموح بها',
  'min'      => 'قصير جداً',
  'max'      => 'قيمه كبيره جداً',
  'email'    => 'البريد الالكتروني غيز صحيح',
]);

$v->validate([
  'id'         => [$id,       'required|int'],
  'new_price'  => [$new_price, 'isPrice'],
  'note'       => [$note,     'min(1)|max(250)'],
  'order_id'   => [$order_id, "required|int"],
]);
if ($new_price == 0) {
  if (empty($note)) {
    $note_err = "يجب ذكر ملاحظه";
  } else {
    $note_err = implode($v->errors()->get('note'));
  }
}
function httpPost($url, $data)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}

if ($v->passes() && empty($note_err)) {
  try {
    $sql = 'update orders set order_status_id =?,new_price=? where id=? and driver_id=? and driver_invoice_id=0 and storage_id=0 and invoice_id=0';
    $result = setData($con, $sql, ['4', $new_price, $order_id, $id]);
    if ($result > 0) {
      $success = 1;
      $sql = 'insert into tracking (order_status_id,note,order_id,staff_id) values(?,?,?,?)';
      $result = setData($con, $sql, ['4', $note, $order_id, $userid]);
      $sql = "select staff.token as s_token, orders.id as id , clients.sync_dns as dns, clients.sync_token as token, orders.isfrom as isfrom, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
      $res = getData($con, $sql, [$order_id]);
      if ($res[0]['isfrom'] == 2) {
        $response = httpPost(
          $res[0]['dns'] . '/api/orderStatusSync.php',
          [
            'token' => $res[0]['token'],
            'status' => 4,
            'note' => 'واصل - ' . $note,
            'price' => $new_price,
            'id' => $order_id,
          ]
        );
      }
      //sendNotification([$res[0]['s_token'],$res[1]['s_token'],$res[0]['c_token']],[$order_id],'طلب رقم ',"تم تسليم الطلب - ".$note,"../orderDetails.php?o=".$order_id);
    } else {
      $error['note'] = "لايمكن تحديث الحالة";
    }
  } catch (PDOException $ex) {
    $data = ["error" => $ex];
    $success = "0";
    $msg = "Query Error";
  }
} else {
  $error = [
    'id' => implode($v->errors()->get('id')),
    'note' => $note_err,
    'price' => implode($v->errors()->get('new_price')),
    'orderid' => implode($v->errors()->get('order_id')),
  ];
  $msg = "Request Error";
}
echo json_encode(['code' => 200, 'message' => $msg, 'sync' => json_decode(substr($response, 3)), 'success' => $success, 'error' => $error]);
