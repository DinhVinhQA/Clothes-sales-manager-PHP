<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html";charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" /> 
    <title>Halo Store | Thanh Toán</title>
    
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
   $conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
   mysqli_set_charset($conn,'UTF8');
   $id=$_GET['id'];
   $id_tach = explode(",",$id);


     // thư viện gửi mail
    include  ("PHPMailer-master/src/Exception.php");
    include  ("PHPMailer-master/src/OAuth.php");
    include  ("PHPMailer-master/src/PHPMailer.php");
    include  ("PHPMailer-master/src/POP3.php");
    include  ("PHPMailer-master/src/SMTP.php");
  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

 if(isset($_POST['send'])) {
 
       $mail = new PHPMailer(true);

  
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'quocminh123.dt@gmail.com';                     // SMTP username
        $mail->Password   = '6402wanbi';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->charset="utf-8";
        $mail->setFrom('quocminh123.dt@gmail.com', 'Halo Store');
        $mail->addAddress('wanbiquocanh.hs@gmail.com'); 
        $mail->addAddress($_POST['mail']);      // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Don Dat Hang Moi';

        ob_start();

        echo "Tên khách hàng : ".$_POST['name']."<br />";
        echo "Địa chỉ giao hàng : ".$_POST['diachi']."<br />";
        echo "Số điện thoại : ".$_POST['sdt']."<br />";
        echo "Mail : ".$_POST['mail']."<br />";
        echo "Hình thức thanh toán : ".$_POST['hinhthuc']."<br />";
        echo "Mã giảm giá : ".$_POST['MaGiamGia']."<br />";
        echo "Đơn hàng  : <br /><br />";

        $sql = "SELECT * FROM sanpham where ID like '$id_tach[0]' ";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query) ;
        $ten =  $row["TenTieuDe"];
        $ma =  $row["ID"];
        $gia = $row["GiaMoi"];
        $tongtien = $row["GiaMoi"]*$id_tach[2];
                      
        echo "Mã  :".$ma.' - ';
        echo "Tên mặt hàng  :".$ten.' - ';
        echo "Số lượng  :".$id_tach[2].' - ';
        echo "Size :".$id_tach[1].' - ';
        echo "Đơn giá :". $gia.'.000 VND';
        echo "<br />";
                       
                       
        echo "<br />";       
        echo "Tổng tiền : ".$tongtien.'.000 VND';


        $mail->Body    =ob_get_contents();;
        $mail->AltBody = '';
        $mail->send();
        echo '<script type="text/javascript"> alert("Đơn hàng đã được gửi")
       </script>';
         header('location:index.php');
         
}


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

 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                       <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                           Xác nhận thông tin đơn hàng
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <form   class="aa-review-form">
                             <div  class="form-group row">
                                <label class="col-md-3" for="message">Tên khách hàng</label>
                                <div class="col-md-8">
                                   <input type="text" class="form-control" name ="name" placeholder="Họ và tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label class="col-md-3" for="message">Địa chỉ nhận hàng</label>
                                 <div class="col-md-8">
                                   <input type="text" class="form-control"  name ="diachi" placeholder="Địa chỉ nhận hàng" required>
                                 </div>
                            </div>  
                            <div class="form-group row">
                                 <label class="col-md-3" for="message">Số điện thoại</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control"  name ="sdt" placeholder="Số điện thoại" required>
                                 </div>
                            </div>
                             <div class="form-group row">
                                 <label class="col-md-3" for="message">Email</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control"  name ="mail" placeholder="Email" required>
                                 </div>
                            </div>
                             <div class="form-group row">
                                 <label class="col-md-3" for="message">Mã giảm giá</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control"  name ="MaGiamGia" placeholder="Nhập ãm giảm giá (nếu có)">
                                 </div>
                            </div>
                             <div class="form-group row">
                                 <label class="col-md-3" for="message">Hình thức thanh toán</label>
                                 <div class="col-md-8">
                                    <div class=" aa-checkout-single-bill">
                                        <select name ="hinhthuc"  style="
                                                                          height: 35px;
                                                                          border-radius: 4px;
                                                                          border: 1px solid #ccc;
                                                                      " required>
                                          <option value="0"  >Chọn hình thức thanh toán</option>
                                          <option value="Thanh toán khi giao hàng" >Thanh toán khi giao hàng</option>
                                          <option value="Thanh toán khi giao hàng" " >Thanh toán trực tiến</option>
                                        </select>
                                       </div>         
                                 </div>
                            </div>
                           
                            <h3 class="aa-tt-button-header ">
                             <button  type="submit" class="btn btn-success aa-tt-button " style="margin-right: 10px;"><a style="color: #fff" href="index.php">Tiếp tục mua hàng</a></button>
                               <button  type="submit" class="btn btn-success aa-tt-button "  name="send">Gửi đơn hàng</button>
                           </h3>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Login section -->
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Đơn hàng của bạn</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Sản phẩm</th>
                          <th>Đơn giá</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                    
                        
                               $sql = "SELECT * FROM sanpham where ID like '$id_tach[0]' ";
                                $query = mysqli_query($conn, $sql);
                                 $row = mysqli_fetch_assoc($query) ;
                                 $ten =  $row["TenTieuDe"];
                                 $gia = $row["GiaMoi"];
                                 $tongtien = $row["GiaMoi"]*$id_tach[2];
                                ?>
                                <tr>
                                  <td><?php echo $ten.'( size : '.$id_tach[1].')'                                         
                                   ?><strong> x <?php echo $id_tach[2] ?></strong></td>
                                  <td><?php echo  $tongtien.'.000' ?></td>
                                </tr>
                         </tbody>
                      <tfoot>
                        <tr>
                          <th>Thành tiền </th>
                          <td><?php echo $tongtien.'.000 VND' ?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>


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