
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

 if(isset($_POST['sub'])) {
 
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
        $mail->setFrom('quocminh123.dt@gmail.com', 'Email dang ki');
        $mail->addAddress('wanbiquocanh.hs@gmail.com');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Email dang ki nhan tin';

        $mail->Body    ='Email : '.$_POST['mail'];
        $mail->AltBody = '';
        $mail->send();
          echo '<script type="text/javascript"> alert("Đăng kí thành công")
       </script>';
 
    
 
}

?>


  <!-- footer -->  
    <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>HALO STORE</h3>
                    <address>
                      <p>87 Trường chinh - thành phố Huế</p>
                      <p><span class="fa fa-phone"></span>0128.767.9757</p>
                      <p><span class="fa fa-envelope"></span>m.me/halo.store.hue</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="https://www.facebook.com/halo.store.hue"><span class="fa fa-facebook"></span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>TRỢ GIÚP & TƯ VẤN</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="Lien-he.php"> <i class="fa fa-angle-double-right"></i> Liên hệ</a></li>
                    <li><a href="Ban-Do.php"> <i class="fa fa-angle-double-right"></i> Bản đồ</a></li>
                    <li><a href="CachChonSize.php"> <i class="fa fa-angle-double-right"></i>  Cách chọn size quần áo</a></li>
                    <li><a href="ChinhSachKhachVIP"> <i class="fa fa-angle-double-right"></i> Chính sách ưu đãi thành viên</a></li>
                    <li><a href="Chinh-sach-giao-hang.php"> <i class="fa fa-angle-double-right"></i> Chính sách giao hàng</a></li>
                    <li><a href="Chinh-Sach-Doi-Hang.php"> <i class="fa fa-angle-double-right"></i> Chính sách đổi trả</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <h3>ĐỊA CHỈ SHOWROOM TẠI THÀNH PHỐ HUẾ</h3>
                    <ul class="aa-footer-nav">
                      <li><i class="fa fa-map-marker"></i> 87 Trường chinh thành phố huế
                        <em>(0128.767.9575)</em>
                      </li>
                    </ul>
                  </div>
              </div>
               <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <h3>THƯ BÁO</h3>
                    <p>Đăng kí nhận tin khuyến mãi</p>
                    <form action="" class="aa-subscribe-form" method="POST">
                        <input type="email" name="mail" id="" placeholder="Email của bạn">
                        <br />
                        <input type="submit" value="Đăng kí" name="sub">
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by T-Đ-Vinh TTVT </p>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
