<!DOCTYPE html>
<html lang="en">
  <head>
     <meta http-equiv="Content-Type" content="text/html";charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Halo Store | Danh mục sản phẩm</title>
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

  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">  
    <?php 
     session_start();
     $priceMin=0;
     $priceMax = 10000000;
     $id=$_GET['id'];

     //  lấy giá trị giá để lọc tìm kiếm 
     if (isset($_POST['price'])) {
        echo 'vinh dep trai';
        $str = 'location:Danh-muc-san-pham.php?id='.$id.'&price='.$_POST['priceMin'].'-'.$_POST['priceMax'];
        header($str);
     }
     if (isset($_GET['price'])) {
        $strpr =  explode("-",$_GET['price']);
        $priceMin=$strpr[0];
        $priceMax =$strpr[1];
       
     }
      $conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
      mysqli_set_charset($conn,'UTF8');
 
// BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, "select count(id) as total from SanPham where ID_Cha like '$id' AND (GiaMoi >= $priceMin AND GiaMoi <= $priceMax)");
      // echo "select count(id) as total from SanPham where ID_Cha like '$id'";
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];

 // lấy giá trị tab

// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 12;
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
      $total_page = ceil($total_records / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page){
          $current_page = $total_page;
      }
      else if ($current_page < 1){
          $current_page = 1;
      }
       
      // Tìm Start
      $start = ($current_page - 1) * $limit;
       

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
                <h1>Danh mục sản phẩm</h1>
              </div>

              <div class="aa-product-catg-head-right">
                <span>Xem : </span>
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php

                           $sql = "SELECT * FROM sanpham where ID_Cha like '$id' AND (GiaMoi >= $priceMin AND GiaMoi <= $priceMax) LIMIT $start,$limit ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                           $result = $conn->query($sql);
                     
                    if ($result==NULL) 
                      echo '<h4 style="text-align: center;font-weight: bold;">Không tìm thấy sản phẩm</h4>';

                    else if ($result->num_rows > 0) 
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
                        <!-- start single product item -->              
                     </ul>        
             
            
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
             <ul class="aa-pagination" >
                 <?php
                  // PHẦN HIỂN THỊ PHÂN TRANG
                  // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                   
                  // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                  if ($current_page > 1 && $total_page > 1){
                      echo '<a class="aa-pagination-footer" href="Danh-muc-san-pham.php?id='.$id.'&price='.$priceMin.'-'.$priceMax.'&&page='.($current_page-1).'" > <span aria-hidden="true" class="left-t">&laquo;</span> </a> ';
                  }
                   
                  // Lặp khoảng giữa
                  for ($i = 1; $i <= $total_page; $i++){
                      // Nếu là trang hiện tại thì hiển thị thẻ span
                      // ngược lại hiển thị thẻ a
                      if ($i == $current_page){
                          echo '<span class="aa-pagination-footer-ht">'.$i.'</span> ';
                      }
                      else{
                          echo '<a class="aa-pagination-footer" href="Danh-muc-san-pham.php?id='.$id.'&price='.$priceMin.'-'.$priceMax.'&&page='.$i.'">'.$i.'</a> ';
                      }
                  }
                   
                  // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                  if ($current_page < $total_page && $total_page > 1){
                      echo '<a class="aa-pagination-footer" href="Danh-muc-san-pham.php?id='.$id.'&price='.$priceMin.'-'.$priceMax.'&&page='.($current_page+1).'"> <span aria-hidden="true">&raquo;</span> </a> ';
                  }
                   
                    ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Thể loại</h3>
              <ul class="aa-catg-nav">
                <li><a href="Danh-muc-san-pham-C1.php?id=AN00"">Áo nam</a></li>
                <li><a href="Danh-muc-san-pham-c.php?id=QN00">Quần nam</a></li>
                <li><a href="Danh-muc-san-pham-c.php?id=GN00">Giày nam</a></li>
                <li><a href="Danh-muc-san-pham-c.php?id=BL00">Balo nam</a></li>
                <li><a href="Danh-muc-san-pham-c.php?id=PK00">Phụ kiện nam</a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Giá</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form  method="POST" id="aa-sidebar-price-range-form">
                  <input type="number" name="priceMin" placeholder="Tối thiểu">
                  <input type="number" name="priceMax" style=" margin-right: 5px;" placeholder="Tối đa">
                  <button type="submit" name="price"><span class="fa fa-play"></span></button>
               </form>
              </div>              
            </div>
            <!-- single sidebar -->
            <!-- single sidebar -->
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

<!-- footer -->  
    <?php require_once __DIR__ ."/footer.php" ?>
  <!-- / footer -->

    

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