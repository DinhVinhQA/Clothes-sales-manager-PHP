<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" />   
    <title>Halo Store | Giới Thiệu</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
     <!-- jQuery library -->


  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">  
       <?php 
     session_start();
     // thư viện gửi mail
  include  ("PHPMailer-master/src/Exception.php");
  include  ("PHPMailer-master/src/OAuth.php");
  include  ("PHPMailer-master/src/PHPMailer.php");
  include  ("PHPMailer-master/src/POP3.php");
  include  ("PHPMailer-master/src/SMTP.php");
  
    ?>
   <!-- START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

   <?php require_once __DIR__ ."/header.php" ?>
  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fs.jpg" style="width: 100%;">
   <div class="aa-catg-head-banner-area">
   </div>
  </section>.
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <h1 style="font-weight: bold;">GIỚI THIỆU</h1>
                 <p>Cửa hàng quần áo nam Halo Store</p>
              </div>
              <div class="aa-product-kv">
                <img src="img/halo.jpg">
                <h3>1. TỔNG QUAN VỀ HALO</h3>
                <p>- Halo được khánh thành vào năm 2015 <br />
                  - Địa chỉ cửa hàng : 87- Trường chinh - TP.Huế<br />
                  - Số điện thoại : 0128.767.9575 <br />
                  - Email : m.me/halo.store.hue <br />
                  - Facebook : https://www.facebook.com/halo.store.hue
                </p>
                <h3>2. CÁC MẶT HÀNG Ở HALO</h3>
                   Halo chuyên bán các dòng sản phẩm thời trang nam :
                    Quần jear nam, quần kaki, quần Jogger, Áo thun nam, Áo sơ mi,Áo khoác, Giày, Các loại phu kiến nam.......
                
                </p>
            
              </div>
               
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>HALO STORE </h3>
              <ul class="aa-catg-nav">
                <li><a href="Lien-he.php"> <i class="fa fa-angle-double-right"></i> Liên hệ</a></li>
                <li><a href="Ban-Do.php"> <i class="fa fa-angle-double-right"></i> Bản đồ</a></li>
                <li><a href="CachChonSize.php"> <i class="fa fa-angle-double-right"></i>  Cách chọn size quần áo</a></li>
                <li><a href="ChinhSachKhachVIP.php"> <i class="fa fa-angle-double-right"></i> Chính sách ưu đãi thành viên</a></li>
                <li><a href="Chinh-sach-giao-hang.php"> <i class="fa fa-angle-double-right"></i> Chính sách giao hàng</a></li>
                <li><a href="Chinh-Sach-Doi-Hang.php"> <i class="fa fa-angle-double-right"></i> Chính sách đổi trả</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Sản phẩm hot</h3>
              <div class="aa-recently-views">
                <ul>
                 
                      <?php

                           $sql = "SELECT * FROM sanpham where GhiChu like 'H' LIMIT 0,5 ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                    if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $idh = $row["ID"];
                            $anh = $row["HinhAnh"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];

                      ?>


                          <li>
                            <a href="chi-tiet-san-pham.php?id=<?php echo "$idh" ?>" class="aa-cartbox-img"><img alt="img" src="<?php echo"$anh" ?>"></a>
                            <div class="aa-cartbox-info">
                              <h4><a href="#"><?php echo"$ten" ?></a></h4>
                              <p><?php echo"$gia.000" ?></p>
                            </div>                    
                          </li>



                          <?php
                             }
                           }
                        ?>                                        
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


   <?php require_once __DIR__ ."/footer.php" ?>
  <!-- / footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
    <script>
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("menu");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>

  </body>
</html>