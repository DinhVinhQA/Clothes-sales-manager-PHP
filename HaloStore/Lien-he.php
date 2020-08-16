<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html";charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon" /> 
    <title>Halo Store | Liên hệ</title>
    
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
        $mail->setFrom('quocminh123.dt@gmail.com', 'Khach Hàng'.$_POST['name']);
        $mail->addAddress('wanbiquocanh.hs@gmail.com'); // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Lien he khach hang';

        ob_start();

        echo "Tên khách hàng : ".$_POST['name']."<br />";
        echo "Địa chỉ  : ".$_POST['diachi']."<br />";
        echo "Số điện thoại : ".$_POST['sdt']."<br />";
        echo "Mail : ".$_POST['mail']."<br />";
        echo "Chủ đề liên hệ : ".$_POST['hinhthuc']."<br />";
        echo "Nội dung liên hệ : ".$_POST['Noidung']."<br />";
        echo " <br /><br />";
        $mail->Body    =ob_get_contents();;
        $mail->AltBody = '';
        $mail->send();
     
         header('location:Lien-he.php');
         
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
                           Gửi liên hệ về halo Store
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <form   class="aa-review-form">
                            <div  class="form-group row">
                                <label class="col-md-3" for="message">Nhập họ tên</label>
                                <div class="col-md-8">
                                   <input type="text" class="form-control" name ="name" placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label class="col-md-3" for="message">Địa chỉ</label>
                                 <div class="col-md-8">
                                   <input type="text" class="form-control"  name ="diachi" placeholder="Địa chỉ">
                                 </div>
                            </div>  
                            <div class="form-group row">
                                 <label class="col-md-3" for="message">Số điện thoại</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control"  name ="sdt" placeholder="Số điện thoại">
                                 </div>
                            </div>
                             <div class="form-group row">
                                 <label class="col-md-3" for="message">Email</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control"  name ="mail" placeholder="Email">
                                 </div>
                            </div>
                              <div class="form-group row">
                                 <label class="col-md-3" for="message">Chọn chủ đề liên hệ</label>
                                 <div class="col-md-8">
                                    <div class=" aa-checkout-single-bill">
                                        <select name ="hinhthuc"  style="
                                                                          height: 35px;
                                                                          border-radius: 4px;
                                                                          border: 1px solid #ccc;
                                                                      ">
                                          <option value="0"  >--Chọn chủ đề liên hệ</option>
                                          <option value="Cần tư vấn mua hàng" >Cần tư vấn mua hàng</option>
                                          <option value="Hỏi về tình trạng đơn hàng" " >Hỏi về tình trạng đơn hàng</option>
                                          <option value="Phàn nàn dịch vụ" " >Phàn nàn dịch vụ</option>
                                          <option value="Chủ đề khách" " >Chủ đề khách</option>
                                        </select>
                                       </div>         
                                 </div>
                            </div>
                             <div class="form-group row">
                                 <label class="col-md-3" for="message">Nội dung</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control" style="height: 100px;" name ="Noidung" placeholder="Nội dung liên hệ">
                                 </div>
                            </div>
                            <h3 class="aa-tt-button-header ">
                               <button  type="submit" class="btn btn-success aa-tt-button "  name="send">Gửi</button>
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
                 <div class="aa-contact-address">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>----------THÔNG TIN LIÊN HỆ----------</h4>
                     <p><span class="fa fa-home"></span>&emsp; Trụ sở chính ; 87 Trường chinh - thành phố Huế</p>
                     <p><span class="fa fa-phone"></span>&emsp; 0128.767.9575</p>
                     <p><span class="fa fa-envelope"></span>&emsp; Email : m.me/halo.store.hue</p>
                     <p>Website Halo Store là website chuyên bán các dòng sản phẩm thời trang nam :
                     Quần jear nam, quần kaki, quần Jogger, Áo thun nam, Áo sơ mi,Áo khoác, Giày, Các loại phu kiến nam.......</p>
                   </address>
                  </div> 
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