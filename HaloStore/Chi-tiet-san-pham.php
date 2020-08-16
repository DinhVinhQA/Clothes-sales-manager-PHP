<!DOCTYPE html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html";charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="fb:app_id" content="450083532221620" />
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" />    
    <title>Halo Shop | Chi tiết sản phẩm</title>
    
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
  <body>  
  
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=450083532221620&autoLogAppEvents=1"></script>



    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->
   <?php 
     session_start();
   $id=$_GET['id'];
// Kiểm tra kết nối thành công hay thất bại
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
$conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
mysqli_set_charset($conn,'UTF8');

// thư viện gửi mail
  include  ("PHPMailer-master/src/Exception.php");
  include  ("PHPMailer-master/src/OAuth.php");
  include  ("PHPMailer-master/src/PHPMailer.php");
  include  ("PHPMailer-master/src/POP3.php");
  include  ("PHPMailer-master/src/SMTP.php");


if (isset($_POST['Mua'])) {
  
  $string = 'location:Thanh-Toan-Nhanh.php?id='.$id.','.$_POST["size"].','.$_POST["SoLuong"];
  header($string);
}


?>

 <!-- START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
 <!-- Start header section -->
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
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->

                          <?php

                           $sql = "SELECT ID_cha,HinhAnh,HinhAnh_list,TenTieuDe,GiaMoi,TrangThai,Size FROM sanpham where ID like '$id' ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                    if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $id_cha = $row["ID_cha"];
                            $anh = $row["HinhAnh"];
                            $anh_list = $row["HinhAnh_list"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];
                            $tinhtrang = $row["TrangThai"];
                            $size = $row["Size"];

                            // lấy tên tiêu đề sản phẩm cha
                            $sql1 = "SELECT * FROM menucon where ID like '$id_cha' ";
                            // Thực thi câu truy vấn và gán vào $result -->
                            $result1 = mysqli_query($conn, $sql1);
                            $sanpham = mysqli_fetch_assoc($result1);
                            $tensanphamcha = $sanpham["TenTieuDe"];
                            $idcha = $sanpham["ID"];
                                 
                      ?>

                
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><img src="<?php echo" $anh" ?>" ></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="<?php echo" $anh" ?>" data-lens-image="<?php echo" $anh" ?>" class="simpleLens-thumbnail-wrapper" href="#">
                            <img style="width: 50px;"  src="<?php echo" $anh" ?>">
                          </a> 
                            <a data-big-image="<?php echo" $anh_list" ?>" data-lens-image="<?php echo" $anh_list" ?>" class="simpleLens-thumbnail-wrapper" href="#">
                            <img style="width: 50px;"  src="<?php echo" $anh_list" ?>">
                          </a> 
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo "$ten" ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">Giá : <?php echo "$gia.000" ?></span>
                      <p class="aa-product-avilability">Tình trạng : <span><?php echo "$tinhtrang" ?></span></p>
                    </div>
                    <?php
                      $size = explode(",",$size);
                    ?>          
                    <div class="aa-prod-quantity row">
                      
                       <form  method="post" action="">
                        <div class="col-md-12 row">
                          <h4 class="col-md-5" style="margin-top: 2px; font-size: 14px;color: #000" >Chọn size : </h4>
                          <select   name="size">
                            <?php
                              if (isset($size)) {
                              ?>
                            <option selected="<?php echo $size[0] ?>" value="<?php echo $size[0] ?>"><?php echo $size[0] ?></option>
                            <?php
                              for( $i=1; $i< count( $size);$i++){
                              ?>
                              <option value="<?php echo $size[$i] ?>"><?php echo $size[$i] ?></option>
                            <?php
                              }
                             }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-12 row">
                           <h4 class="col-sm-5" style="margin-top: 2px;font-size: 14px;color: #000" >Số lượng : </h4>
                            <select  id="" name="SoLuong">
                              <option selected="1" value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
                        </div>
                          <p class="aa-prod-category">
                          Danh mục sản phẩm : <a style="color:#f57224" href="Danh-muc-san-pham.php?id=<?php echo "$idcha" ?>" ><?php echo "$tensanphamcha" ?></a>
                            </p>
                          <div class="aa-prod-view-bottom" >
                            <button  type="submit" class="btn btn-success aa-add-to-cart-btn" style="margin-right: 10px;"><a style="color: #fff" href="Giohang.php?id=<?php echo "$id" ?>">Thêm vào giỏ hàng</a></button>
                               <button  type="submit" class="btn btn-success aa-add-to-cart-btn "  name="Mua" "><a 
                                style="color: #fff"> Mua sản phẩm </a> </button>
                          </div>
                      </form>
                    </div>
                    
                    
                  </div>
                </div>
                    <?php
                             }
                           }
                        ?>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <div class="aa-product-review-area">
                   <h4>Bình luận</h4> 
                   <div class="fb-comments" data-href="chi-tiet-san-pham.php?id=<?php echo "$id" ?>" data-width="100%" data-numposts="5" data-order-by ="reverse_time"></div>
                 </div>
                </div>   
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm có liên quan</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                  <?php

                           $sql = "SELECT * FROM sanpham where ID_Cha like '$idcha' LIMIT 8 ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                    if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $id1 = $row["ID"];
                            $anh = $row["HinhAnh"];
                            $ten =  $row["TenTieuDe"];
                            $gia = $row["GiaMoi"];
                            $giac = $row["GiaCu"];
                            $size = $row["Size"];


                      ?>
                        <li>
                           <figure>
                            <a class="aa-product-img" href="chi-tiet-san-pham.php?id=<?php echo "$id1" ?>"><img src="<?php echo"$anh" ?> "  alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" style="letter-spacing: 3px;" href="chi-tiet-san-pham.php?id=<?php echo "$id1" ?>"><?php echo"$size" ?></a>
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
                            <a href="Giohang.php?id=<?php echo "$id1" ?>" data-toggle2="tooltip" data-placement="top" title="Mua <?php echo "$ten" ?>"data-toggle="modal" ><span class="fa fa-shopping-cart"></span></a>                             
                          </div>
                          <!-- product badge -->
                        </li>
                          <?php
                             }
                           }
                        ?>                                                                    
              </ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
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