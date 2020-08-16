<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" />    
    <title>Halo Store | Giỏ hàng </title>
    
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
    <?php 

   session_start();
    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id=$_GET['id'];

         @$_SESSION['cart_'.$id]+=1;
          header('location:Giohang.php');


    }
    if(isset($_GET['them'])){

         $_SESSION['cart_'.$_GET['them']]+=1;
          header('location:Giohang.php');


    }
     if(isset($_GET['tru'])){

         $_SESSION['cart_'.$_GET['tru']]--;
          header('location:Giohang.php');

    }
     if(isset($_GET['xoa'])){
         $_SESSION['cart_'.$_GET['xoa']]=0;
         header('location:Giohang.php');

    }



// Kiểm tra kết nối thành công hay thất bại
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
  $conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
   mysqli_set_charset($conn,'UTF8');


 // lấy tên tiêu đề sản phẩm cha
  
                                 
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

<!-- header -->
  <?php require_once __DIR__ ."/header.php" ?>
  <!-- /header  -->



 <section id="aa-catg-head-banner">
   <img src="img/fs.jpg" style="width: 100%;">
   <div class="aa-catg-head-banner-area">
   </div>
  </section>.
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th></th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     <?php
                      $thanhtien =0;
                      $tongsp=0;
                      $i=1;
                        foreach($_SESSION as $name => $value) {
                          if ($value>0) {
                            if (substr($name,0,5)=='cart_') {
                              $id = substr($name,5,strlen($name)-5);
                               $sql = "SELECT * FROM sanpham where ID like '$id' ";
                                $query = mysqli_query($conn, $sql);
                               //  $row = mysqli_fetch_assoc($result1);
                               // $query = mysqli_query($sql);
                              
                                 $row = mysqli_fetch_assoc($query) ;
                                 $anh = $row["HinhAnh"];
                                 $ten =  $row["TenTieuDe"];
                                 $gia = $row["GiaMoi"];
                                 $tongtien = $row["GiaMoi"]*$value;

                                 ?>
                               <tr >
                                <td><?php echo $i ?></fa></a></td>
                                <td><a href="#"><img src="<?php echo $anh ?>" alt="img"></a></td>
                                <td><a class="aa-cart-title" href="#"><?php echo $ten ?></a></td>
                                <td><?php echo  $gia.'.000' ?></td>
                                <td >
                                  <div class="aa-cart-ach">
                                     <a class="aa-cart-add" href="Giohang.php?tru=<?php echo "$id" ?>"><i class="fa fa-minus"></i> </a>
                                   <input class="aa-cart-quantity"  value="<?php echo $value ?>">
                                   <a class="aa-cart-add" href="Giohang.php?them=<?php echo "$id" ?>"> <i class="fa fa-plus"></i> </a>
                                  </div>
                                  
                                 </td>
                                   
                                <td><?php echo  $tongtien.'.000' ?></td>
                                <td><a class="aa-cart-add1" href="Giohang.php?xoa=<?php echo "$id" ?>"><i class="fa fa-trash"></i> </a></td>
                                 </tr>
                        <?php 
                                $tongsp +=$value;
                                $thanhtien += $tongtien;
                                 $i=$i+1;
                              # code...
                            }
                          }
                          # code...
                        }
                         
                     ?>
                     
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Thông tin đơn hàng</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng số lượng sản phẩm </th>
                     <td><?php echo $tongsp ?> sản phẩm</td>
                   </tr>
                    <tr>
                     <th>Phí giao hàng</th>
                     <td><?php echo $thanhtien.'.000 VND' ?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="Thanh-Toan.php" class="btn btn-primary aa-cart-view-btn">Xác nhận giỏ hàng</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <!-- / Subscribe section -->

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