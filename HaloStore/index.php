<!DOCTYPE html>
<html lang="en">
  <head>
     <meta http-equiv="Content-Type" content="text/html";charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" /> 
    <title>Halo Store | Home</title>
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
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    


  </head>
  <body> 
  
 <?php 
  session_start();

$conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
mysqli_set_charset($conn,'UTF8');

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
<!--  -->
  <!-- / menu -->
  <!-- Start slider -->
 <?php require_once __DIR__ ."/Quang-Cao.php" ?>
  <!-- / slider -->
  <!-- Start Promo section -->
  <!--  -->
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <h1> THỜI TRANG HOT NHẤT </h1>
                <h2>-------<i class="fa fa-star"></i>--------</h2>
                 <p>Sản phẩm thời trang được quan tâm nhiều nhất, trong bộ sưu tập thời trang tại Halo Store</p>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start new product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        <?php

                           $sql = "SELECT * FROM sanpham where GhiChu like 'H' LIMIT 0,8 ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                     if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $anh = $row["HinhAnh"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];
                            $giac = $row["GiaCu"];
                            $size = $row["Size"];


                      ?>
                        <li>
                            <figure>
                              <a class="aa-product-img" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"><img src="<?php echo"$anh" ?> "  alt="polo shirt img"></a>
                              <a class="aa-add-card-btn" style="letter-spacing: 3px;" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"> <?php echo"$size" ?></a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#"><?php echo"$ten" ?> </a></h4>
                                <span class="aa-product-price"><?php echo"$gia.000" ?></span>
                                <?php 
                                  if($giac!=NULL && $giac != 0 )
                                      echo "<span class='aa-product-price1'><del> $giac.000 </del>";
                                  ?>
                              
                              </figcaption>
                            </figure>                        
                            <div class="aa-product-hvr-content">
                              <a href="Giohang.php?id=<?php echo "$id" ?>" data-toggle2="tooltip" data-placement="top" title="Mua <?php echo "$ten" ?>"data-toggle="modal" ><span class="fa fa-shopping-cart"></span></a>                             
                            </div>
                          <!-- product badge -->
                        </li>
                          <?php
                             }
                           }
                        ?>
                        <!-- start single product item -->            
                      </ul>
                    </div>
                      
                    <!-- / new product category -->
                  </div>
                  <!-- quick view modal -->                  
                      
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="img/fashion-banner.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <h1> THỜI TRANG MỚI NHẤT </h1>
                 <h2>-------<i class="fa fa-star"></i>--------</h2>
                 <p>Danh sách cách sản phẩm thời trang nam mới nhất được cập nhật trong bộ sưu tập thời trang tại Halo Store</p>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                         <?php

                           $sql = "SELECT * FROM sanpham where GhiChu like 'M' LIMIT 0,8 ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                      if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $anh = $row["HinhAnh"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];
                            $giac = $row["GiaCu"];
                            $size = $row["Size"];


                      ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"><img src="<?php echo"$anh" ?> "  alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" style="letter-spacing: 3px;" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"><?php echo"$size" ?></a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo"$ten" ?> </a></h4>
                              <span class="aa-product-price"><?php echo"$gia.000" ?></span>
                              <?php 
                                if($giac!=NULL && $giac != 0 )
                                    echo "<span class='aa-product-price1'><del> $giac.000 </del>";
                                ?>
                              </span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="Giohang.php?id=<?php echo "$id" ?>" data-toggle2="tooltip" data-placement="top" title="Mua <?php echo "$ten" ?>"data-toggle="modal" ><span class="fa fa-shopping-cart"></span></a>                             
                          </div>
                          <!-- product badge -->
                        </li>
                          <?php
                             }
                           }
                        ?>
                        <!-- start single product item -->            
                      </ul>
                    </div>
                      </ul>
                    </div>
                    <!-- / men product category -->
                  </div>
                  <!-- quick view modal -->                           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="img/fashion-banner.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->

    <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
            <h1> THỜI TRANG BÁN CHẠY NHẤT </h1>
             <h2>-------<i class="fa fa-star"></i>--------</h2>
                 <p>Danh sách cách sản phẩm thời trang nam bán chạy, sản phẩm thời trang hot trong bộ sưu tập thời trang tại Halo Store</p>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                   <?php

                           $sql = "SELECT * FROM sanpham where GhiChu like 'C' LIMIT 0,8 ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                    if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $anh = $row["HinhAnh"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];
                            $giac = $row["GiaCu"];
                            $size = $row["Size"];


                      ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"><img src="<?php echo"$anh" ?> "  alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" style="letter-spacing: 3px;" href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>"><?php echo"$size" ?></a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo"$ten" ?> </a></h4>
                              <span class="aa-product-price"><?php echo"$gia.000" ?></span>
                              <?php 
                                if($giac!=NULL && $giac != 0 )
                                    echo "<span class='aa-product-price1'><del> $giac.000 </del>";
                                ?>
                              </span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="Giohang.php?id=<?php echo "$id" ?>" data-toggle2="tooltip" data-placement="top" title="Mua <?php echo "$ten" ?>"data-toggle="modal" ><span class="fa fa-shopping-cart"></span></a>                             
                          </div>
                          <!-- product badge -->
                        </li>
                          <?php
                             }
                           }
                        ?>
                        <!-- start single product item -->            
                      </ul>
                    </div>
                       <?php 
                       $conn->close(); ?>                                                   
                  </ul>
                </div>
                <!-- / popular product category -->   
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>THANH TOÁN & GIAO HÀNG</h4>
                <P>Miễn phí vận chuyển cho đơn hàng trên 1.000.000 vnd <br />
                  - Giao hàng và thu tiền tận nơi <br />
                  - Chuyển khoản và giao hàng <br />
                  - Mua hàng tại shop
                </P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>HOÀN TIỀN TRONG 30 NGÀY</h4>
                <P>Hoàn lại tiền trong 30 ngày nếu sản phẩm bị lỗi <br />
                  - Báo lại trong vòng 1 đến 2 ngày <br />
                  - Không tháo mạc quần áo <br />
                  - Giữ nguyên ven sản phẩm
                </P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>HỖ TRỢ 24/7</h4>
                <P>Gọi ngay cho chúng tôi nếu bạn có thắc mắc <br />
                  - Đường dây nóng : 0128.767.9757
                 </P>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-credit-card"></span>
                <h4>THẺ THÀNH VIÊN</h4>
                <P>Chế độ ưu đãi cho thành viên <br />
                    - Giảm 15k cho thành viên MEMBER <br />
                    - Giảm 10% cho thành viên VIP <br />
                    (Không áp dụng cho phụ kiện , hàng sale)
                </P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->

  <!-- footer -->  
    <?php require_once __DIR__ ."/footer.php" ?>
  <!-- / footer -->

  <!-- Login Modal -->  

  <!-- jQuery library -->
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