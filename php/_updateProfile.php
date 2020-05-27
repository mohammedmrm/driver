<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require("_crpt.php");
require("_access.php");
access();
require("dbconnection.php");

use Violin\Violin;
require_once('../validator/autoload.php');
$v = new Violin;
$success = 0;
$error = [];
$id        = $_SESSION['userid'];
$name      = $_REQUEST['name'];
$email     = $_REQUEST['email'];
$phone     = $_REQUEST['phone'];
$password  = $_REQUEST['password'];


$v->addRuleMessage('isPhoneNumber', ' رقم هاتف غير صحيح  ');

$v->addRule('isPhoneNumber', function($value, $input, $args) {
    return   (bool) preg_match("/^[0-9]{10,15}$/",$value);
});
$v->addRuleMessage('unique', 'القيمة المدخلة مستخدمة بالفعل ');

$v->addRule('unique', function($value, $input, $args) {
    $exists = getData($GLOBALS['con'],"SELECT * FROM staff WHERE phone ='".$value."' and id !='".$GLOBALS['id']."'");
    return  ! (bool) count($exists);
});
$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'regex'      => 'فقط الارقام مسموح بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
    'email'      => 'البريد الالكتروني غيز صحيح',
]);

$v->validate([
    'id'             => [$id,      'required|int'],
    'name'    => [$name,    'required|min(4)|max(20)'],
    'email'   => [$email,   'email'],
    'phone'   => [$phone,   "required|unique|isPhoneNumber"],
    'password'=> [$password,"min(6)|max(18)"],
]);

if($v->passes()) {
   if(empty($password)){
   $sql = 'update staff set name = ?, email=?,phone=? where id=?';
   $result = setData($con,$sql,[$name,$email,$phone,$id]);
   }else{
   $password= hashPass($password);
   $sql = 'update staff set password=?,name = ?, email=?,phone=? where id=?';
   $result = setData($con,$sql,[$password,$name,$email,$phone,$id]);
   }
  if($result > 0){
    $success = 1;
  }
}else{
  $error = [
           'id_err'=> implode($v->errors()->get('id')),
           'name_err'=> implode($v->errors()->get('name')),
           'email_err'=>implode($v->errors()->get('email')),
           'phone_err'=>implode($v->errors()->get('phone')),
           'password_err'=>implode($v->errors()->get('password'))
           ];
}
echo json_encode(['success'=>$success, 'error'=>$error,$_POST]);
?>