

     <?php 
// thư viện gửi mail
 


    if(isset($_GET['xoa'])){

         $_SESSION['cart_'.$_GET['xoa']]=0;
         header('location:index.php');

    }

    $conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
    mysqli_set_charset($conn,'UTF8');

   
  
?>
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone">
                  <p><span class="fa fa-phone" id="phone"></span> Hotline : <a href="#">0128.767.9757 </a></p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li class="hidden-xs" ><a href="CachChonSize.php">Cách chọn size </a></li>
                  <li class="hidden-xs"><a href="ChinhSachKhachVIP.php">Chính xác khách vip</a></li>
                  <li class="hidden-xs"><a href="GioiThieu.php">Giới thiệu</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  </span>
                  <p>Halo Store Shop <span>shut up & wear it</span></p>
                </a>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
               
                <div class="aa-cartbox-summary">
                  <ul>
                     <?php
                      $thanhtien =0;
                      $tongsp=0;
                      $i=1;
                        foreach($_SESSION as $name => $value) {
                          if ($value>0) {
                            if (substr($name,0,5)=='cart_') {
                              $id_S = substr($name,5,strlen($name)-5);
                               $sql = "SELECT * FROM sanpham where ID like '$id_S' ";
                                $query = mysqli_query($conn, $sql);
                               //  $row = mysqli_fetch_assoc($result1);
                               // $query = mysqli_query($sql);
                                 $row = mysqli_fetch_assoc($query) ;
                                 $anh= $row["HinhAnh"];
                                 $ten =  $row["TenTieuDe"];
                                 $gia = $row["GiaMoi"];
                                 $tongtien = $row["GiaMoi"]*$value;

                                ?>
                                 <li>
                                    <a class="aa-cartbox-img" href="#"><img src="<?php echo  $anh ?>" alt="img"></a>
                                    <div class="aa-cartbox-info">
                                      <h4><a href="#"><?php echo $ten ?></a></h4>
                                      <p> <?php echo $value.' x '.$gia.'.000' ?></p>
                                    </div>
                                    <a class="aa-remove-product" href="Thanh-Toan.php?xoa=<?php echo "$id_S" ?>"><span class="fa fa-times"></span></a>
                                  </li>
                                <?php 
                                        $tongsp +=$value;
                                        $thanhtien += $tongtien;
                                         $i=$i+1;
                                      # code...
                                    }
                                  }
                                  # code...
                                } ?>               
                    <li>
                      <span class="aa-cartbox-total-title">
                        Tổng tiền
                      </span>
                      <span class="aa-cartbox-total-price">
                        <td><?php echo  $thanhtien.'.000 VND' ?></td>
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="Thanh-Toan.php">Thanh toán</a>
                </div>
                 <a class="aa-cart-link" href="GioHang.php">
                  <span class="fa fa-shopping-cart"></span>
                  <span class="aa-cart-title"></span>
                  <span class="aa-cart-notify"><?php echo  $tongsp ?></span>
                </a>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="Tim-kiem.php" method="GET">
                  <input type="text" name="textsearch" id="" placeholder="Tìm kiếm trên Halo Store ">
                  <button type="submit"><span class="fa fa-search"> Tìm kiếm</span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <div id="menu">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">HOME</a></li>
              <li><a href="Danh-muc-san-pham-C1.php?id=AN00">ÁO NAM<span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="Danh-muc-san-pham-c.php?id=AS00">Áo sơ mi nam &emsp;&emsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="Danh-muc-san-pham.php?id=ASH00">Áo sơ mi hàn quốc</a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ASC00">Áo sơ mi caro</a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ASN00">Áo sơ mi ngắn tay</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="Danh-muc-san-pham-c.php?id=AT00">Áo thun nam &emsp;&emsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="Danh-muc-san-pham.php?id=ATCC00">Áo thun có cổ </a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ATCT00">Áo thun cổ tròn</a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ATTD00">Áo thun tay dài </a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ATBL00">Áo thun ba lỗ</a></li>      
                    </ul>
                  </li>
                  <li><a href="Danh-muc-san-pham-c.php?id=AK00">Áo khoác nam &emsp;&emsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="Danh-muc-san-pham.php?id=AKD00">Áo khoác dù</a></li>
                      <li><a href="Danh-muc-san-pham.php?id=AKJ00">Áo khoác jear </a></li>
                      <li><a href="Danh-muc-san-pham.php?id=AKH00">Áo hoodie</a></li>      
                    </ul>
                  </li>
                  <li><a href="Danh-muc-san-pham-c.php?id=AL00">Áo len &emsp;&emsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="Danh-muc-san-pham.php?id=ALC00">Áo len có cỗ</a></li>
                      <li><a href="Danh-muc-san-pham.php?id=ALK00">Áo len không cỗ </a></li>    
                    </ul>
                  </li>                       
                  <li><a href="#">Áo phao</a></li>
                </ul>
              </li>
              <li><a href="Danh-muc-san-pham-c.php?id=QN00">QUẦN NAM <span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="Danh-muc-san-pham.php?id=QKK00">Quần kaki hàn quốc</a></li>
                   <li><a href="Danh-muc-san-pham.php?id=QJ00">Quần jear</a></li>              
                  <li><a href="Danh-muc-san-pham.php?id=QJG00">Quần jogger</a></li>
                  <li><a href="Danh-muc-san-pham.php?id=QS00">Quần short </a></li>
                </ul>
              </li>
              <li><a href="Danh-muc-san-pham-c.php?id=GN00">GIÀY NAM <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="Danh-muc-san-pham.php?id=GNK00">Giày nike</a></li>
                  <li><a href="Danh-muc-san-pham.php?id=GV00">Giày vans</a></li>
                </ul>
              </li>
             <li><a href="Danh-muc-san-pham-c.php?id=BL00">BALO NAM <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="Danh-muc-san-pham.php?id=BD00">Balo 2 đai</a></li>
                  <li><a href="Danh-muc-san-pham.php?id=BC00">Balo chéo</a></li>    
                   <li><a href="Danh-muc-san-pham.php?id=BT00">Túi bao tử</a></li>             
                </ul>
              </li>         
              <li><a href="Danh-muc-san-pham-c.php?id=PK00">PHỤ KIÊN NAM <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="Danh-muc-san-pham.php?id=PKV00">Ví </a></li>
                  <li><a href="Danh-muc-san-pham.php?id=PKM00">Mũ </a></li>
                  <li><a href="Danh-muc-san-pham.php?id=PKT00">Tất </a></li>
                  <li><a href="Danh-muc-san-pham.php?id=PKTL00">Thắt lưng </a></li>
                  <li><a href="Danh-muc-san-pham.php?id=PKVD00">Vòng đeo tay </a></li>
                  <li><a href="Danh-muc-san-pham.php?id=PKKT00">Khẩu trang </a></li>            
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
  </div>
  <!-- / menu -->  
