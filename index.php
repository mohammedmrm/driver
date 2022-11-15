<?php
die('<h3>تم ايقاف العمل بالرابط يرجى استخدام التطبيق<br /><a title="رابط تطبيق الاندرويد" href="https://play.google.com/store/apps/details?id=com.alzaim.driver&amp;pli=1">رابط تطبيق الاندرويد</a><br /><a title="رابط تطبيق الايفون" href="https://apps.apple.com/app/id1640770198">رابط تطبيق الايفون</a></h3>');
if (!isset($_SESSION)) {
  session_start();
}
$access_roles = [1];
if (!in_array($_SESSION['login'], $access_roles)) {
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
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
  <title><?php echo $config["Company_name"] ?></title>
  <link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="styles/framework.css">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="styles/toast.css">
  <link rel="manifest" href="pwa/site.webmanifest">
  <?php
  echo $config['analytics'];
  ?>
</head>

<body class="theme-light" data-background="none" data-highlight="red2">
  <style type="text/css">
    .bg-div1 {
      background-color: #5500cc;
    }

    .bg-div2 {
      background-color: #4411cc;
    }

    .bg-div3 {
      background-color: #3322cc;
    }

    .bg-div4 {
      background-color: #2233cc;
    }

    .bg-div5 {
      background-color: #1144cc;
    }

    .returned {
      height: 5rem;
      background-color: #FF0000;
    }

    .posponded {
      height: 5rem;
      background-color: #FFCC33;
    }

    .recived {
      height: 5rem;
      background-color: #66CC33;
    }

    .all {
      height: 5rem;
    }

    .waiting {
      height: 5rem;
    }

    .last span {
      display: block;
      width: 100%;
      min-height: 22px;
    }
  </style>
  <script type="text/javascript" src="scripts/jquery.js"></script>
  <div id="page">

    <?php include_once("pre.php");  ?>
    <?php include_once("top-menu.php");  ?>
    <?php include_once("bottom-menu.php");  ?>
    <div class="page-content header-clear-medium">
      <div class="content-boxed">
        <div class="col-sm-12">
          <div class="input-group mb-3">
            <button class="input-group-prepend" onclick="search($('#search_word').val(),$('#in').val())" data-toggle="modal" data-target="#searchModal">
              <span class="input-group-text" id="inputGroup-sizing-sm">بحث</span>
            </button>
            <input type="text" id="search_word" placeholder="رقم الوصل ،رقم هاتف الزبون " class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            <select class="form-control" id="in" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              <option value="1">طلبايتي</option>
              <option value="2">كل الشحنات</option>
            </select>
          </div>
        </div>
      </div>
      <div class="content-boxed">
        <div class="content caption  bottom-20">
          <div class="one-half last all">
            <span class="text-center font-22" id="">طلبيات اليوم</span>
            <span class="text-center font-22" id="today">0</span>
          </div>
          <div class="one-half last last-column waiting">
            <span class="text-center font-22">قيد الانتظار</span>
            <span class="text-center font-22" id="waiting">0</span>
          </div>
          <div class="one-third last returned">
            <span class="text-center font-22" id="returned">0</span>
            <span class="text-center font-22">الرواجع</span>
          </div>
          <div class="one-third last posponded">
            <span class="text-center font-22" id="posponded">0</span>
            <span class="text-center font-22" id="">المؤجلات</span>
          </div>
          <div data-height="70" class="one-third last-column last recived">
            <span class="text-center font-22" id="recived">0</span>

            <span class=" text-center font-22" id="">
              المستلمه
            </span>
          </div>
        </div>
        <div class=" divider bg-blue2-dark">
        </div>
        <div class="clear">
          <a href="orders.php">
            <div data-instant-id="instant-1" data-height="100" class="bg-div1 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">الطلبيات</h1>
                <p class="center-text color-white under-heading">البحث و عرض الطلبيات</p>
              </div>
              <div class="caption-bottom">
                <p class="center-text color-white opacity-30">انقر للعرض</p>
              </div>

              <div class="caption-overlay  opacity-80"></div>
            </div>
          </a>
        </div>
        <div class="one-half">
          <a href="returned.php">
            <div data-instant-id="instant-2" data-height="100" class="bg-div2 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">الرواجع</h1>
                <p class="center-text color-white under-heading">تقرير بالرواجع</p>
              </div>
              <div class="caption-bottom">
                <p class="center-text color-white opacity-30"></p>
              </div>

              <div class="caption-overlay opacity-80"></div>
            </div>
          </a>
        </div>

        <div class="one-half last-column">
          <a href="posponded.php">
            <div data-instant-id="instant-3" data-height="100" class="bg-div3 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">المؤجلات</h1>
                <p class="center-text color-white under-heading">تقرير بجميع المؤجلات</p>

              </div>
              <div class="caption-bottom">
                <p class="center-text color-white opacity-30"></p>
              </div>
              <div class="caption-overlay opacity-80"></div>
            </div>
          </a>
        </div>
        <div class="clear">
          <a href="recived.php">
            <div data-instant-id="instant-4" data-height="100" class="bg-div4 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">الواصل</h1>
                <p class="center-text color-white under-heading">الطلبيات الواصلة</p>

              </div>
              <div class="caption-bottom">
                <p class="center-text color-white opacity-30"></p>
              </div>
              <div class="caption-overlay opacity-80"></div>
            </div>
          </a>
        </div>
        <div class="clear">
          <a href="earnings.php">
            <div data-instant-id="instant-4" data-height="100" class="bg-div4 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">الارباح</h1>
                <label class="center-text color-white under-heading"><label id="recived-price"">0</label>
              الف الاجر التقريبي
              </label>
                 
              </div>
              <div class=" caption-bottom">
                    <p class="center-text color-white opacity-30"></p>
              </div>
              <div class="caption-overlay opacity-80"></div>
            </div>
          </a>
        </div>

        <div class="clear last-column">
          <a href="charts.php">
            <div data-instant-id="instant-5" data-height="100" class="bg-div5 caption caption-margins round-medium shadow-large">
              <div class="caption-center">
                <h1 class="center-text color-white bolder font-22">احصائيات</h1>
                <p class="center-text color-white under-heading">تقرير احصائي بالطلبيات المؤجلة والراجعة والمستلمة</p>

              </div>
              <div class="caption-bottom">
                <p class="center-text color-white opacity-30"></p>
              </div>
              <div class="caption-overlay opacity-80"></div>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title text-left" id="exampleModalLongTitle">الطلبات <span id="orders_count"></span></h5>

        </div>
        <div class="modal-body">
          <div id="orders"></div>
        </div>
        <div class="modal-footer text-right">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="scripts/jquery.js"></script>
  <script type="text/javascript" src="scripts/plugins.js"></script>
  <script type="text/javascript" src="scripts/custom.js"></script>
  <script type="text/javascript" src="scripts/toast.js"></script>

  <script type="text/javascript">
    function static() {
      $.ajax({
        url: "php/_static.php",
        type: "POST",
        data: $("#searchForm").serialize(),
        success: function(res) {
          console.log(res);
          $.each(res.data, function() {
            $("#today").text(res.today);
            $("#waiting").text(res.waiting);
            $("#returned").text(this.returned);
            $("#posponded").text(this.posponded);
            $("#recived").text(this.recived);
            $("#recived-price").text(res.price);
          })
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    static();

    function search(search, type) {
      $.ajax({
        url: "php/_search.php",
        type: "POST",
        data: {
          search: search,
          type: type
        },
        beforeSend: function() {
          $("#orders").addClass("loading");
        },
        success: function(res) {
          $("#orders").removeClass("loading");
          $("#orders").html('');
          $("#orders_count").text(" ( " + res.orders + " ) ");
          console.log(res);
          if (res.orders == 0) {
            $("#orders").html("<center><h1>لايوجد طلبيات مطابقة للبحث</h1></center>")
          }
          $.each(res.data, function() {
            if (this.order_status_id == 9) {
              color = 'bg-red1-dark';
            } else if (this.order_status_id == 6) {
              color = 'bg-red1-light';
            } else if (this.order_status_id == 4) {
              color = 'bg-green1-dark';
            } else if (this.order_status_id == 5) {
              color = 'bg-yellow1-dark';
            } else if (this.order_status_id == 7) {
              color = 'bg-orange-light';
            } else if (this.order_status_id == 1) {
              color = 'bg-dark1-dark';
            } else {
              color = 'bg-magenta1-light';
            }
            $("#orders").append(
              '<div class="content-boxed ' + color + '">' +
              '<div class="content  list-columns-right">' +
              '<div>' +
              '<a style="z-index:100;" class="call" href="tel:' + this.driver_phone + '"><i class="fa fa-phone color-green1-light call fa-2x"></i></a>' +
              '<a href="orderDetails.php?o=' + this.id + '">' +
              '<h1 class="bolder text-center text-white">' + this.order_no + '</h1>' +
              '<p class=" text-center text-white">' +
              this.customer_phone +
              '<br />' + this.city + ' | ' + this.town + ' | ' + this.address +
              '<br />' + this.store_name +
              '<br /><b>' + this.driver_name + '-' + this.driver_phone + '</b>' +
              '<br />( ' + this.t_note +
              ' )</p>' +
              '</a>' +
              '</div>' +
              '</div>' +
              '</div>'
            );
          });
        },
        error: function(e) {
          $("#orders").removeClass("loading");
          console.log(e);
        }
      });
    }
  </script>
  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-messaging.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <!--<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-analytics.js"></script>
-->
  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-firestore.js"></script>
  <script>
    // Check that service workers are supported
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('sw.js')
      });
    }
  </script>
  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyCmIr87Ihp8nXtHrKWZyeH1GcvFrHxmtJw",
      authDomain: "alnahr-3a32e.firebaseapp.com",
      databaseURL: "https://alnahr-3a32e.firebaseio.com",
      projectId: "alnahr-3a32e",
      storageBucket: "alnahr-3a32e.appspot.com",
      messagingSenderId: "410160983978",
      appId: "1:410160983978:web:22a64081a20724ec9185d3",
      measurementId: "G-QYSFSMTB8R"
    };
    // Initialize Firebase
    if (firebase.messaging.isSupported()) {
      firebase.initializeApp(firebaseConfig);
      //  firebase.analytics();
      const messaging = firebase.messaging();
      navigator.serviceWorker.register('scripts/firebase-sw.js')
        .then((registration) => {
          messaging.useServiceWorker(registration);
          messaging.requestPermission()
            .then(function() {
              console.log(messaging.getToken());
              return messaging.getToken();
            })
            .then(function(token) {
              console.log(token);
              updateUserToken(token);
            })
            .catch(function(err) {
              console.log("error")
            });
          messaging.onMessage(function(payload) {
            console.log('On message', payload);
            Toast.success(payload.notification.body, payload.notification.title);
            getNotification();
          });
        });
    } else {
      Notification.requestPermission().then(function(result) {
        console.log(Notification.getToken());
      });
    }

    function updateUserToken(token) {
      $.ajax({
        url: "php/_updateToken.php",
        data: {
          token: token
        },
        type: "POST",
        success: function(res) {
          console.log(res);
        },
        error: function(e) {
          console.log(e);
        },
      });
    }
  </script>
</body>

</html>