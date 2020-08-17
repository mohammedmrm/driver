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
<meta name="description" content="الراجع من المندوب">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
<title>شركة النهر للحلول البرمجية</title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="styles/datapicker.css">
<link rel="manifest" href="pwa/site.webmanifest"> 
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
        .bg-green_ {
            background-color: #0F9D58;
        }

        .bg-blue_ {
            background-color: #4285F4;
            color: black;
        }

        .bg-yallow_ {
            background-color: #F4B400;
        }

        .bg-gray_ {
            background-color: #D3D3D3;
        }

        .bg-red_ {
            background-color: #DB4437;
        }

        .bg-carrot_ {
            background-color: #ED5E21 !important;
        }
    .searchBar{
        background-color:coral;
        color:black;
    } 
</style>
</head>

<body class="theme-light" data-background="none" data-highlight="blue2">

<div id="page">

    <!-- load main header and footer -->
   <?php include_once("pre.php");  ?>
   <?php include_once("top-menu.php");  ?>
   <?php include_once("bottom-menu.php");  ?>
    <div class="page-content header-clear-medium">

         <div class="content">
         <form id="searchForm">
            <div class="search-box searchBar shadow-tiny round-tiny bottom-10">
                <i class="fa fa-search"></i>
                <input type="text" aria-label="search" name="search-text" placeholder="رقم الوصل، رقم او اسم الزبون">
            </div>
            <input type="text" aria-label="date from" name="start" id="start" class="datepicker" placeholder="من">
            <input type="text" aria-label="date to" name="end" id="end" class="datepicker"  placeholder="الى">
            <button id="search" aria-label="search button" onclick="getorders('reload')" class="btn searchBar shadow-huge" type="button" value="">
                 بحث
            </button>
            <input type="hidden" name="currentPage" id="currentPage" value="1">
         </form>
        </div>


        <div class="content-boxed">
            <div class="content bottom-0">
                <h3 class="bolder text-right">الطلبيات الراجعة<span id="orders_count"></span></h3>
            </div>


            <div id="orders"></div>

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

function getorders(action){
if(action == "reload"){
    $("#currentPage").val(1);
}
$.ajax({
  url:"php/_getReturnedOrders.php",
  type:"POST",
  data:$("#searchForm").serialize(),
  success:function(res){
    if(action == "reload"){
     $("#orders").html('');
    }
   $("#loader").remove();
   $("#loading-items").remove();
   $("#currentPage").val(res.nextPage);
   $("#orders_count").text(" ( "+res.orders+" ) ");
   console.log(res);
   $.each(res.data,function(){
   if (this.order_status_id == 9) { // changed address
          color = 'bg-red_';
      } else { //not recieved yes
          color = 'bg-gray_';
      }
     $("#orders").append(
          '<a href="orderDetails.php?o='+this.id+'">'+
             '<div data-accordion="accordion-content-10" data-height="100" class="caption caption-margins round-small bottom-5" style="height: 110px;">'+
                '<div class="caption-center">'+
                    '<h4 class="color-white center-text bottom-0 uppercase bolder">'+this.order_no+'</h4>'+
                    '<p class="color-white right-text right-10 bottom-0">'+this.store_name+'</p>'+
                    '<p class="color-white right-text right-10 bottom-0">'+this.customer_name+' | '+this.customer_phone+'</p>'+
                    '<p class="color-white right-text right-10 bottom-0">'+this.city+' | '+this.town+'</p>'+
                '</div>'+
                '<div class="caption-overlay '+color+' opacity-80"></div>'+
                '<div class="caption-background "></div>'+
            '</div>'+
          '</a>'
       );
     });
     if(res.pages > res.nextPage){
      $("#orders").append('<div id="loader" onclick="getorders(\'append\')" class="btn btn-link form-control center-text top-10">تحميل المزيد</div>');
      $("#orders").append('<div id="loading-items"></div>');
     }
     if(res.pages == 0){
        $("#orders").append('<div class="text-center text-danger">لايوجد اي طلبيات</div>');
     }
    },
   error:function(e){
    console.log(e);
  }
});
}
getorders('reload');
function showReport(){
  window.location.href = 'reportVeiwer.php?'+$("#searchForm").serialize()+'orderStatus[]=6&orderStatus[]=9&orderStatus[]=5';
}
</script>
</body>
</html>
