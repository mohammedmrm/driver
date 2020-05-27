<?php
if(!isset($_SESSION)){
  session_start();
}
$access_roles = [1];
if(! in_array($_SESSION['login'],$access_roles)){
    header("location: login.php");
    die();
}
require_once("config.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
<meta name="description" content="الارباح لشركات التوصيل من المندوب">

<title>شركة النهر للحلول البرمجية</title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="styles/datapicker.css">

<!-- load header -->
<style type="text/css">
 #search{
   width: 30%;
   min-width:10px;
   margin-left: 1.3333%;
   margin-right: 0%;
 }
 #start {
  width: 30%;
  margin-left: 1.3333%;
  margin-right: 0%;
  min-width:10px;
  border-bottom: #777777 solid 1px;
 }
 #end{
   width: 30%;
   margin-left:1.3333%;
   margin-right: 0%;
   min-width:10px;
   border-bottom: #777777 solid 1px;
 }
    .searchColor{
       color: black;
        background-color: yellowgreen;
    }
</style>
<script type="text/javascript" src="scripts/jquery.js"></script>

</head>

<body class="theme-light" data-background="none" data-highlight="red2">

<div id="page">

    <!-- load main header and footer -->
   <?php include_once("pre.php");  ?>
   <?php include_once("top-menu.php");  ?>
   <?php include_once("bottom-menu.php");  ?>

    <div class="page-content header-clear-medium">

         <div class="content">
         <form id="searchForm">
            <input type="text" aria-label="date from" name="start" id="start" class="datepicker" placeholder="من">
            <input type="text" name="end" aria-label="date to" id="end" class="datepicker"  placeholder="الى">
            <button id="search" onclick="earnings()" class="btn searchColor shadow-huge" type="button" value="">
                 بحث
            </button>
            <input type="hidden"  name="currentPage" id="currentPage" value="1">
         </form>
        </div>


        <div class="content-boxed">
            <div class="content bottom-0">
                <h3 class="bolder text-right">تقرير الارباح</h3>
            </div>


            <div id="earnings"></div>

         </div>

         <!-- load footer -->
         <div id="footer-loader"></div>
    </div>
</div>


<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/datapicker.js"></script>
<script type="text/javascript" src="sw_reg.js"></script>

<script>
$('#start').datepicker({ format: 'yyyy-mm-dd'});
$('#end').datepicker({ format: 'yyyy-mm-dd'});

function earnings(){
  $.ajax({
  url:"php/_earnings.php",
  type:"POST",
  data:$("#searchForm").serialize(),
  success:function(res){
    $("#earnings").html("")
    console.log(res);
    $.each(res.data,function(){
       $("#earnings").append(
       '<div class="clear text-right" >'+
            '<div  class="content-boxed  bg-green1-light bottom-20">'+
                '<div class=" content bottom-15">'+
                    '<h4 class="text-center">'+this.date+'</h4>'+
                    '<p class="color-white top-5 bottom-0">السعر الكلي : '+this.new_price+'</p>'+
                    '<p class="color-white top-5 bottom-0">سعر التوصيل : '+this.dev_price+'</p>'+
                    '<p class="color-white top-5 bottom-0">مبلغ الخصم : '+this.discount+'</p>'+
                    '<p class="color-white top-5 bottom-0">المبلغ الصافي : '+this.client_price+'</p>'+
                    '<p class="color-white top-5 bottom-0">عدد الطلبيات: '+this.orders+'</p>'+
                '</div>'+
            '</div>'+
        '</div>'
       )
    });
  },
  error:function(e){
    console.log(e);
  }
});
}
earnings();
</script>
</body>
</html>
