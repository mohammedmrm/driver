<?php
require_once("../api/_apiAcccess.php")
try{

$con = new PDO('mysql:host=localhost;dbname=nahar', "root",
"", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
//$con->exec("SET CHARACTER SET UTF8");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException  $e ){
echo "Error: ".$e;
}
function getData($db,$query,$parm = []) {
  $stmt = $db->prepare($query);
  $stmt->execute($parm);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}
function setData($db, $query, $parm = [])
{
  $userid = $_SESSION['userid'] ? $_SESSION['userid'] : $userid ? $userid : -1;
  $stmt = $db->prepare($query);
  $stmt->execute($parm);
  $count = $stmt->rowCount();
  $log = $db->prepare("insert into logs (type,staff_id,query,rowCount,parms) values(?,?,?,?)");
  $log->execute(['driver',$userid, $query, $count, json_encode($parm)]);
  return $count;
}

?>
