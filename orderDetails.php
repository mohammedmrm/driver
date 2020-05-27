<?php
require("php/_access.php");
access([1,2,4]);

include("config.php");
?><!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>شركة النهر للحلول البرمجية</title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<!-- load header -->
<style>
.link {
  text-underline: none;
  width: 100%;
  height: 100%;
  display: inline-block;
}
.link:hover {
  text-decoration-line: none;
}
.input-style-1 {
  border-bottom: 2px solid #222222;
}
.timeline-deco {
width:5px;
background-color:#666666;
}
 .chatbody {
  height: 400px;
  border-bottom:2px solid #D3D3D3;
  border-radius: 1px;
  overflow-y: scroll;
  padding-top:5px;
  width:100%;
  margin-top:10px;
 }
 .msg {
   display: block;
   position: relative;
   margin-bottom:15px;
   padding-bottom:10px;
 }
 .other{
   position: relative;
   margin-left:0px;
   width:80%;
   margin-right:auto;
   text-align: left !important;
 }
 .other .content {
   background-color: #F8F8FF;
   border-top-right-radius: 5px;
   border-bottom-right-radius: 5px;
   text-align: left !important;
 }

 .mine {
   position: relative;
   width:80%;
   margin-right: 2px;
   text-align: right;
 }
 .mine .content {
   background-color: #008B8B;
   color:#F8F8FF;
   border-top-left-radius: 5px;
   border-bottom-left-radius: 5px;
 }

 .content{
   position: relative;
   padding:5px;
   padding-left:15px;
   padding-right:15px;
   min-width:10px;
   max-width:100%;
   font-size: 16px;
   color:#000000;
   margin:0 !important;
   display: block;
 }
.name {
  position: relative;
  display: inline-block;
  font-size:10px;
  margin-bottom:2px;
}
.time {
  display:inline-block;
  position: relative;
  font-size: 10px;
  color: #696969;
  margin-top:2px;
}
.inputs {
  margin-bottom:20px;
}
.chat-btn:hover{
  color: #F8F8FF;
  text-decoration: none;
}

.chat-btn {
  display: block;
  background-color: #F96332;
  color:#F8F8FF;
  text-align: center;
  padding: 2px;
   box-shadow: 0 5px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.08)!important;
}
.chat-btn span{
  width: 100%;
  height: 100%;
  display: block;
}

.input-chat-send {
  height: 40px !important;
  border-top-left-radius: 5px !important;
  border-bottom-left-radius: 5px !important;
}
.btn-chat-send {
  height: 40px;
  border-top-right-radius: 5px !important;
  border-bottom-right-radius:5px !important;
}
</style>
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>

<body class="theme-light" data-background="none" data-highlight="red2">

<div id="page">



   <?php include_once("pre.php");  ?>
   <?php include_once("top-menu.php");  ?>
   <?php include_once("bottom-menu.php");  ?>

    <div class="page-content header-clear-medium">
         <input type="hidden" id="order_id" value="<?php echo $_GET['o']?>">
         <a href="#" class="chat-btn left-5 right-5 top-5 bottom-5" data-menu="chat" onclick="OrderChat(<?php echo $_GET['o']?>)" class="btn btn-waring btn-full ">
                <span class="left-5 right-5 top-5 bottom-5">محادثه</span>
         </a>
         <div class="content-boxed top-5 bottom-5">
           <div class="one-half">
              <div   class="bottom-5 color-white font-20 link-list link-list-1 bg-green1-light rounded">
                <a href="#" class="link" data-menu="recived" >
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">تم التسليم</span>
                </a>
              </div>
           </div>
           <div class="one-half last-column">
              <div  class="bottom-5 color-white font-20 link-list link-list-1 bg-red1-light rounded">
                <a href="#" data-menu="returned" class="link">
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">راجع جزئي</span>
                </a>
              </div>
           </div>
           <div class="clear"></div>
           <div class="one-half">
              <div  class="bottom-5 color-white font-20 link-list link-list-1 bg-orange-light rounded">
                <a href="#" data-menu="posponded" class="link">
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">مؤجل</span>
                </a>
              </div>
           </div>
           <div class="one-half last-column">
              <div class="bottom-5 color-white font-20 link-list link-list-1 bg-blue1-light rounded">
                <a href="#" data-menu="change"  class="link">
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">تغير العنوان</span>
                </a>
              </div>
           </div>
           <div class="clear"></div>
           <div class="one-half">
              <div class="bottom-5 color-white font-20 link-list link-list-1 bg-yellow1-dark rounded">
                <a href="#" data-menu="replace"  class="link">
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">استبدال</span>
                </a>
              </div>
           </div>
           <div class="one-half last-column">
              <div class="bottom-5 color-white font-20 link-list link-list-1 bg-brown1-dark rounded">
                <a href="#" data-menu="fake"  class="link">
                <span class="text-center color-white left-0 right-0 top-10 bottom-10">راجع كلي</span>
                </a>
              </div>
           </div>
    </div>
    <div id="order-details" class="content-boxed text-right"></div>
    <span class="divider"></span>
    <h1 class="text-center">معلومات تتبع الطلبية</h1>
    <div  id="orderTimeline" class="timeline-body top-10"></div>
</div>



</div>
<div id="recived"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="400"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20">تم تسليم الطلبية ؟</h2>
            <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg"></p>
            <div class="input-style has-icon input-style-1 input-required bottom-30">
                <span class="input-style-1-inactive">المبلغ المستلم</span>
                <input type="number" step="250" id="new_price" name="new_price" placeholder="المبلغ المستلم">
                <input type="hidden" id="order_price" />
            </div>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">ملاحظات</span>
                    <textarea id="note" name="note" placeholder="ملاحظات"></textarea>

            </div>
            <button onclick="recived()" class="button bg-green1-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>

     </div>
</div>

<div id="returned"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="550"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20 text-danger">ارجاع الطلبية ؟</h2>
            <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_returned1"></p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_returned2"></p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_returned3"></p>
            <div class="input-style has-icon input-style-1 input-required bottom-30">
                <span class="input-style-1-inactive">المبلغ المستلم</span>
                <input type="number" step="250" id="new_price_r" name="new_price_r" placeholder="المبلغ المستلم">
            </div>
            <div class="input-style has-icon input-style-1 input-required bottom-30">
                <span class="input-style-1-inactive">عدد القطع الراجعة</span>
                <input type="number" step="250" id="returned_no" name="returned_no" placeholder="عدد القطع الراجعة">
            </div>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">ملاحظات</span>
                    <textarea id="note_r" name="note_r" placeholder="ملاحظات"></textarea>
            </div>
            <button onclick="returned()" class="button bg-red1-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>

     </div>
</div>

<div id="posponded"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="300"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20 color-orange-dark">تأجيل الطلبية؟</h2>
            <p class="font-11 under-heading text-center bottom-20">يجب ذكر السبب</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_posponded"></p>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">سبب التأجيل</span>
                    <textarea id="note_posponded" name="note_posponded" placeholder="سبب التأجيل"></textarea>

            </div>
            <button onclick="posponded()" class="button bg-orange-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>

     </div>
</div>

<div id="change"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="300"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20 color-blue1-dark">تغير عنوان الطلبية؟</h2>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_change"></p>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">تغير العنوان الى</span>
                    <textarea id="address" name="address" placeholder="تغير العنوان الى"></textarea>
            </div>
            <button onclick="change()" class="button bg-blue1-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>
     </div>
</div>
<div id="replace"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="550"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20 color-yellow1-dark">استبدال الطلب ؟</h2>
            <p class="font-11 under-heading text-center bottom-20">يجب ادخال السعر المستلم</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_replace1"></p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_replace2"></p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_replace3"></p>
            <div class="input-style has-icon input-style-1 input-required bottom-30">
                <span class="input-style-1-inactive">المبلغ المستلم</span>
                <input type="number" step="250" id="new_price_re" name="new_price_re" placeholder="المبلغ المستلم">
            </div>
            <div class="input-style has-icon input-style-1 input-required bottom-30">
                <span class="input-style-1-inactive">عدد القطع </span>
                <input type="number" step="250" id="repalce_no" name="repalce_no" placeholder="عدد القطع ">
            </div>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">ملاحظات</span>
                    <textarea id="note_re" name="note_re" placeholder="ملاحظات"></textarea>
            </div>
            <button onclick="replace()" class="button bg-yellow1-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>

     </div>
</div>
<div id="fake"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="300"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20 color-brown1-dark">زبون وهمي؟</h2>
            <p class="font-11 under-heading text-center bottom-20">يجب ذكر السبب</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg_fake"></p>
            <div class="input-style input-style-1 input-required">
                    <span class="input-style-1-inactive">السبب</span>
                    <textarea id="note_fake" name="note_fake" placeholder="السبب"></textarea>

            </div>
            <button onclick="fake()" class="button bg-brown1-dark button-full button-m shadow-large button-round-small bg-highlight top-20">تحديث حالة الطلب</button>

     </div>
</div>
<div id="chat"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="600"
     data-menu-effect="menu-over">
        <div class="col-12">
        <div class="col-12">
        <div class="row">
            <div class="col-12 chatbody" id="chatbody">

            </div>
        </div>
        <div class="row"><hr /></div>
          <div class="row">
            <div class="col-12 padding-none">
              <div class="input-group">
                <div class="input-group-append">
                  <button onclick="sendMessage()" class="btn btn-info btn-chat-send" type="button">ارسال</button>
                </div>
                <textarea type="text" id="message" class="form-control input-chat-send" placeholder="اكتب...." aria-label="" aria-describedby="basic-addon2"></textarea>

              </div>
               <input type="hidden"  id="chat_order_id"/>
               <input type="hidden" value="0" id="last_msg"/>
            </div>
          </div>
        </div>
        </div>
</div>
<div class="toast rounded-pill toast-bottom" id="toast-success">
    <p class="color-white"><i class='fa fa-sync fa-spin right-10'></i>
      تم التحديث
    </p>
    <div class="toast-bg opacity-90 bg-green2-dark"></div>
</div>
<input type="hidden" id="user_id" value="<?php echo $_SESSION['userid'];?>"/>
<input type="hidden" value="<?php echo $_GET['notification'];?>" id="notification_seen_id"  />
<div class="menu-hider"></div>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script>
function getorder(){

$.ajax({
  url:"php/_getOrder.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{id : $("#order_id").val(),},
  success:function(res){
    $("#order-details").html("");
   console.log(res);
   if(res.success == 1){
     $.each(res.data,function(){
       $("#order-details").append(
        '<h1 class="text-center right-10">'+this.order_status+'</h1>'+
        '<h3 class="text-center">'+this.order_no+'</h3>'+
        '<table style="width:100%;" class="table-striped">'+
         '</thead><tr><th class="text-right right-10">النص</th><th>القيمة</th></th></thead>'+
         '<tbody>'+
         '<tr><td class="text-right right-10">اسم الزبون</td><td>'+this.customer_name+'</td></tr>'+
         '<tr><td class="text-right right-10">هاتف الزبون</td><td>'+this.customer_phone+'</td></tr>'+
         '<tr><td class="text-right right-10">اسم العميل</td><td>'+this.client_name+'</td></tr>'+
         '<tr><td class="text-right right-10">رقم هاتف العميل</td><td>'+this.client_phone+'</td></tr>'+
         '<tr><td class="text-right right-10"><br />العنوان<br /></td><td>'+this.city+' | '+this.town+'<br />'+this.address+'</td></tr>'+
         '<tr><td class="text-right right-10">مبلغ الوصل</td><td>'+this.price+'</td></tr>'+
         '<tr><td class="text-right right-10">المبلغ المستلم</td><td>'+this.new_price+'</td></tr>'+
         '<tr><td class="text-right right-10">سعر التوصيل</td><td>'+this.dev_price+'</td></tr>'+
         '<tr><td class="text-right right-10">الخصم</td><td>'+this.discount+'</td></tr>'+
         '<tr><td class="text-right right-10">المبلغ الصافي</td><td>'+this.client_price+'</td></tr>'+
         '</tbody>'+
        '</table>'
       );
       $("#order_price").val(this.price);
     });
   }else{
       $("#order-details").append(
        '<h1>خطأ</h1>'
       );
   }
  },
  error:function(e){
   console.log(e);
  }
});
}
function recived(){
if($("#order_price").val() != $("#new_price").val()){
    if(confirm("السعر المدخل لا يساوي سعر الوصل. هل انت متاكد من السعر؟")){
        $.ajax({
          url:"php/_orderRecived.php",
          type:"POST",
          beforeSend:function(){

          },
          data:{
            id : $("#order_id").val(),
            new_price : $("#new_price").val(),
            note : $("#note").val(),
          },
          success:function(res){
           console.log(res);
           $("#err_msg").html("");
           if(res.success == 1){
              $("#recived").removeClass('menu-active');
              $('#toast-success').addClass('toast-active');
               setTimeout(function(){
                    $('#toast-success').removeClass('toast-active');
               },3000);
              $(".menu-hider").removeClass('menu-active');

              getorder();
           }else{
             $("#err_msg").html(res.error.new_price);
           }
          },
          error:function(e){
           console.log(e);
          }
        });

}else{

    }
}else{
$.ajax({
  url:"php/_orderRecived.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    new_price : $("#new_price").val(),
    note : $("#note").val(),
  },
  success:function(res){
   console.log(res);
   $("#err_msg").html("");
   if(res.success == 1){
      $("#recived").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg").html(res.error.new_price);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}
}
function change(){
$.ajax({
  url:"php/_orderChange.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    address : $("#address").val()
  },
  success:function(res){
   console.log(res);
   $("#err_msg_change").html("");
   if(res.success == 1){
      $("#change").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg_change").html(res.error.address);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}
function posponded(){
$.ajax({
  url:"php/_orderPosponded.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    note : $("#note_posponded").val()
  },
  success:function(res){
   console.log(res);
   $("#err_msg_change").html("");
   if(res.success == 1){
      $("#posponded").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg_posponded").html(res.error.address);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}
function returned(){
$.ajax({
  url:"php/_orderReturned.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    new_price : $("#new_price_r").val(),
    note : $("#note_r").val(),
    items_no : $("#returned_no").val()
  },
  success:function(res){
   console.log(res);
   $("#err_msg_change").html("");
   if(res.success == 1){
      $("#returned").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg_returned1").html(res.error.new_price);
     $("#err_msg_returned2").html(res.error.items_no);
     $("#err_msg_returned3").html(res.error.note);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}

function replace(){
$.ajax({
  url:"php/_orderRepalce.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    new_price : $("#new_price_re").val(),
    note : $("#note_re").val(),
    items_no : $("#repalce_no").val()
  },
  success:function(res){
   console.log(res);
   $("#err_msg_change").html("");
   if(res.success == 1){
      $("#replace").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg_replace1").html(res.error.new_price);
     $("#err_msg_replace2").html(res.error.items_no);
     $("#err_msg_replace3").html(res.error.note);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}

function fake(){
$.ajax({
  url:"php/_orderFake.php",
  type:"POST",
  beforeSend:function(){

  },
  data:{
    id : $("#order_id").val(),
    note : $("#note_fake").val()
  },
  success:function(res){
   console.log(res);
   $("#err_msg_change").html("");
   if(res.success == 1){
      $("#fake").removeClass('menu-active');
      $('#toast-success').addClass('toast-active');
      setTimeout(function(){
      $('#toast-success').removeClass('toast-active');
      },3000);
      $(".menu-hider").removeClass('menu-active');
      getorder();
   }else{
     $("#err_msg_fake").html(res.error.note);

   }
  },
  error:function(e){
   console.log(e);
  }
});
}
function OrderTracking(id){
   $.ajax({
     url:"php/_getOrderTrack.php",
     data:{id: id},
     beforeSend:function(){

     },
     success:function(res){
       $("#orderTimeline").html('');
       $("#orderTimeline").append('<div class="timeline-deco"></div>');
       console.log(res);
     if(res.success == 1){
       $.each(res.data,function(){
         address = "";
         if(this.order_status_id == 1){
             icon = "fa-list";
             color = "blue1-light";
         }else if(this.order_status_id == 2){
             icon = "fa-list";
             color = "blue1-light";
         }else if(this.order_status_id == 3){
             icon = "fa-list";
             color = "magenta2-dark";
         }else if(this.order_status_id == 4){
             icon = "fa-list";
             color = "green2-dark";
         }else if(this.order_status_id == 5){
             icon = "fa-list";
             color = "yellow2-dark";
         }else if(this.order_status_id == 6){
             icon = "fa-list";
             color = "red1-dark";
         }else if(this.order_status_id == 7){
             icon = "fa-list";
             color = "orange-dark";
         }else if(this.order_status_id == 8){
             icon = "fa-list";
             color = "blue1-dark";
             address = "تغير العنوان الى: "+this.new_address;
         }else if(this.order_status_id == 9){
             icon = "fa-list";
             color = "brown1-dark";

         }else{
             icon = "fa-list";
             color = "blue1-light";
         }
         if(this.note != null){
           note = this.note;
         }else{
           note = "";
         }
         $("#orderTimeline").append(
           '<div class="timeline-item">'+
				'<i class="fa '+icon+' bg-'+color+' shadow-large timeline-icon"></i>'+
				'<div class="timeline-item-content shadow-large round-small">'+
					'<h5 class="thin color-'+color+' center-text">'+this.status+'<br />'+this.date+'<br />'+this.hour+'</h5>'+
                    '<p class=" center-text color-theme  bottom-0 font-14">'+note+'</p>'+
                    '<p class="color-'+color+' center-text color-theme top-5 bottom-0 font-14">عدد القطع: '+this.items_no+'</p>'+
                    '<p class=" center-text color-theme top-20 bottom-0 font-16">'+address+'</p>'+
				'</div>'+
			'</div>'
         );
        });
       }else{
         $("#orderTimeline").append("<h2 class='text-center'>لا يوجد معلومات</h2>")
       }
     },
     error:function(e){
       console.log(e);
     }
   });
}
function OrderChat(id,last){
  if(id != $("#chat_order_id").val()){
    chat = 1;
    $("#chatbody").html("");
  }else{
    chat = 0;
  }
  $("#chat_order_id").val(id);

  $.ajax({
    url:"php/_getMessages.php",
    type:"POST",
    data:{order_id:$("#chat_order_id").val(),last:last},
    beforeSend:function(){

    },
    success:function(res){
       if(res.success == 1){
         if(res.last <= 0){
             $("#chatbody").html("");
         }
         $.each(res.data,function(){
            clas = 'other';
           if(this.is_client == 1){
                name = this.client_name
                role = "عميل"
               if(this.from_id== $("#user_id").val()){
                 clas = 'mine';
               }
           }else{
               name = this.staff_name
               if(this.from_id == $("#user_id").val()){
                 clas = 'mine';
               }
             role =  this.role_name;
           }
           message =
           "<div class='row'>"+
             "<div class='msg "+clas+"' msq-id='"+this.id+"'>"+
                "<span class='name'>"+name+ " ( "+role+" ) "+"</span><br />"+
                "<span class='content'>"+this.message+"</span><br />"+
                "<span class='time'>"+this.date+"</span><br />"+
             "</div>"+
           "</div>"
           $("#chatbody").append(message);
           $("#last_msg").val(this.id);
           });
           $("#chatbody").animate({ scrollTop: $('#chatbody').prop("scrollHeight")}, 100);
           //$("#spiner").remove();
       }
    },
    error:function(e){
      console.log(e);
    }
  });
}
function sendMessage(){
  $.ajax({
    url:"php/_sendMessage.php",
    type:"POST",
    data:{message:$("#message").val(), order_id:$("#chat_order_id").val()},
    beforeSend:function(){
      $("#chatbody").append('<div id="spiner" class="spiner"></div>');
    },
    success:function(res){
      OrderChat($("#chat_order_id").val(),$("#last_msg").val());
      $("#chatbody").animate({ scrollTop: $('#chatbody').prop("scrollHeight")}, 100);
      $("#message").val("");
      $("#message").focus();
    },
    error:function(e){
      console.log(e);
    }
  });
}
var mychatCaller;
mychatCaller = setInterval(function(){
  OrderChat($("#chat_order_id").val(),$("#last_msg").val());
}, 1000);
OrderTracking($('#order_id').val())
getorder();
if($("#notification_seen_id").val() > 0){
   $.ajax({
    url:"php/_setNotificationSeen.php",
    type:"POST",
    data:{id:$("#notification_seen_id").val()},
    success:function(res){
       console.log(res);
    }
  });
}
</script>
</body>
</html>
