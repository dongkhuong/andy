 <?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?>  
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Restaurant</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Danh sách các nhà hàng</p>
          </div>
        </div>
        <div class="row">

          <?php
            $sql_restaurant = "SELECT * FROM restaurant";
            $rs_restaurant = $mysqli->query($sql_restaurant);
            while($row_restaurant=$rs_restaurant->fetch_assoc()){
          ?>
          <div class="col-md-3 text-center ftco-animate">
            <div class="menu-wrap">
              <a href="#" class="menu-img img mb-4" style="background-image: url(/andy/files/<?php echo $row_restaurant['image']; ?>);"></a>
              <div class="text">
                <h3><a href="#"><?php echo $row_restaurant['name']; ?></a></h3>
                <p><?php echo $row_restaurant['preview_text']; ?></p>
                <p class="price">Address:&nbsp;<span><?php echo $row_restaurant['address']; ?></span></p>
                <p><a href="#" class="btn btn-white btn-outline-white">Xem chi tiết</a></p>
              </div>
            </div>
          </div>
        <?php } ?>

        </div>
      </div>
    </section>
<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?>     