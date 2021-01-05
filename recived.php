<?php
require_once("php/_access.php");
access();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
    <meta name="description" content="في هذه الصفحة الرئيسية <?php echo $config['Company_name'];?> تستطيع ان تتعرف على الطلبيات الخاصة بك الواصة والراجعة والكثير من المعلومات">
    <meta name="<?php echo $config['Company_name'];?>" property="og:title" content="معلومات متكاملة للعميل في هذه الصفحة خاصة بعملاء  <?php echo $config['Company_name'];?>">

    <title><?php echo $config['Company_name'];?></title>
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
</style>
</head>

<body class="theme-light" data-background="none" data-highlight="red2">

<div id="page">

    <!-- load main header and footer -->
     <?php include_once("pre.php");?>
     <?php include_once("top-menu.php");?>
     <?php include_once("bottom-menu.php");  ?>

    <div class="page-content header-clear-medium">

         <div class="content">
         <form id="searchForm">
            <div class="search-box search-color bg-green1-dark shadow-tiny round-tiny bottom-10">
                <i class="fa fa-search"></i>
                <input type="text" name="search-text" placeholder="رقم الوصل، رقم او اسم الزبون">
            </div>
            <input type="text" name="start" id="start" class="datepicker" placeholder="من">
            <input type="text" name="end" id="end" class="datepicker"  placeholder="الى">
            <button id="search" onclick="getorders('reload')" class="btn btn-success" type="button" value="">
                 بحث
            </button>
            <input type="hidden" name="currentPage" id="currentPage" value="1">
         </form>
        </div>


        <div class="content-boxed">
            <div class="content bottom-0">
                <h3 class="bolder text-right">الطلبيات الواصلة<span id="orders_count"></span></h3>
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
<script>
$('#start').datepicker({ format: 'yyyy-mm-dd'});
$('#end').datepicker({ format: 'yyyy-mm-dd'});

function getorders(action){
if(action == "reload"){
    $("#currentPage").val(1);
}
$.ajax({
  url:"php/_getRecivedOrders.php",
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
     if(this.order_status_id == 9){
       color = 'bg-gradient-red1';
     }else if(this.order_status_id == 6){
        color = 'bg-red2-light';
     }else if(this.order_status_id == 4){
        color = 'bg-green1-dark';
     }else if(this.order_status_id == 5){
        color = 'bg-yellow1-dark';
     }else if(this.order_status_id ==7){
        color = 'bg-orange-light';
     }else if(this.order_status_id ==1){
        color = 'bg-dark1-dark';
     }else{
       color = 'bg-magenta1-light';
     }
     $("#orders").append(
          '<a href="orderDetails.php?o='+this.id+'">'+
             '<div data-accordion="accordion-content-10" class="caption caption-margins round-small bottom-5" style="height: 90px;">'+
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
     if(res.pages >= res.nextPage){
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
</script>
</body>
</html>
