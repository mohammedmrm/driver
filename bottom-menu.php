<style type="text/css">
  #noti-new {
    background-color: #DC143C;
    color:#FFFFFF;
    border-radius: 50px;
    height: 22px;
    min-width: 0px !important;
    padding-left: 6px;
    padding-right: 6px;
  }

</style>
<script type="text/javascript" src="scripts/jquery.js"></script>

<div id="footer-menu" class="footer-menu-3-icons footer-menu-style-2">
    <a href="index.php"><i class="fa fa-home"></i><span>الرئسية</span></a>
    <a href="notfcation.php"><label id="noti-new"></label><i class="fa fa-bell"></i><span>الاشعارات</span></a>
    <a href="profile.php"><i class="fa fa-user"></i><span>الصفحة الشخصية</span></a>
    <div  class="clear"></div>
</div>


<script>
function newNotification(){
    $.ajax({
    url:"php/_getNotification.php",
    success:function(res){
      console.log(res);
      if(res.unseen != 0){
        $("#noti-new").text(res.unseen);
      }else{
        $("#noti-new").text("");
        $("#noti-new").css('padding','0px');
      }
    },
    error:function(e){
      console.log(e,'it for noti');
    }
  });
}
newNotification();

var page = document.location.pathname.match(/[^\/]+$/)[0];
if(page == 'notfcation.php'){
  $('[href="notfcation.php"]').addClass("active-nav");
}else if(page == 'profile.php'){
  $('[href="profile.php"]').addClass("active-nav");
}else if(page == 'index.php'){
   $('[href="index.php"]').addClass("active-nav");
}
</script>