


 <?php 

    $conn = mysqli_connect('localhost', 'root','', 'WebBanQuanAo');
    mysqli_set_charset($conn,'UTF8');

  
?>

<div id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
           <!--  trang mặc định -->

            <?php

                    $sql = "SELECT * FROM QuangCao ";
                     
                    // Thực thi câu truy vấn và gán vào $result
                     $result = $conn->query($sql);
                     
                    // Kiểm tra số lượng record trả về có lơn hơn 0
                    // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
                    if ($result->num_rows > 0) 
                    {
                        // Sử dụng vòng lặp while để lặp kết quả
                        while($row = $result->fetch_assoc()) {
                            $ten =  $row["TenTieuDe"];
                            $noidung = $row["NoiDung"];
                            $anh = $row["HinhAnh"];
                           

                      ?>
                  <li>
                    <div class="seq-model">
                      <img data-seq src="<?php echo $anh ?>" alt="Wristwatch slide img" />
                    </div>
                    <div class="seq-title">        
                      <h2 data-seq><?php echo $ten ?></h2>                
                      <p data-seq><?php echo $noidung ?></p>
                    </div>
                  </li>

                          <?php
                             }
                           }
                        ?>      
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </div>