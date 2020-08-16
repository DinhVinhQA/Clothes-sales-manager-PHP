<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" />   
    <title>Halo Store | Hướng dẫn chọn size</title>
    
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


  <!-- Start header section -->
   <?php require_once __DIR__ ."/header.php" ?>
 
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
                <h1>HƯỚNG DẪN CHỌN SIZE</h1>
                 <p>Nếu bạn băn khoăn không biết chọn size nào cho phù hợp với cân nặng và chiều cao của mình, đừng lo lắng! Hãy xem bảng hướng dẫn chọn size bên dưới mà HALO STORE sẽ tư vấn dành riêng cho bạn</p>
              </div>
              <div class="aa-product-img">
                <img src="img/sizeA.jpg" id="a1" >
                <img src="img/sizeQ.jpg" id="a1">
                <img src="img/sizeG.jpg" id="a1">
                <h5>Chúc bạn lưa chọn thành công và mua được sản phẩm ưng ý</h5>
               <h2>Cảm ơn bạn đã chọn HALO STORE !</h2>

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