<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?>    
    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(/andy/templates/admin/images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <?php 
            $id_user_session = $_SESSION['arUser']['id_user'];
            $sql_profile = "SELECT * FROM users WHERE id_user = $id_user_session";
            $rs_profile = $mysqli->query($sql_profile);
            $row_profile = $rs_profile->fetch_assoc();
          ?>
          <h2 class="mb-4"><?php echo $row_profile['fullname']; ?></h2>
          <h4 class="mb-4"><span style="color:white">POINT:</span>&nbsp;<?php echo $row_profile['point']; ?></h4>
          <p class="mb-4"><span>SĐT:</span>&nbsp;<?php echo $row_profile['phone']; ?></p>
        </div>
        <div class="heading-section ftco-animate ">
          <?php if($row_profile['id_role']==2){?>
            <a href="/andy/admin/bill/add.php" class="btn btn-success">Add bill</a>
          <?php }?>
          <?php if($row_profile['id_role']==1){?>
            <a href="/andy/admin/restaurant/add.php" class="btn btn-info">Add Restaurant</a>
          <?php }?>
        </div>
    	</div>
    </section>
        <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Voucher</h2>
            <p>Những voucher hấp dẫn mà bạn sẽ nhận được</p>
          </div>
        </div>
      </div>
      <div class="container-wrap">
        <div class="row no-gutters d-flex">
          <?php
            $sql_voucher = "SELECT * FROM voucher";
            $rs_voucher = $mysqli->query($sql_voucher);
            while($row_voucher = $rs_voucher->fetch_assoc()){
          ?>
          <div class="col-lg-4 d-flex ftco-animate">
            <div class="services-wrap d-flex">
              <a href="#" class="img" style="background-image: url(/andy/files/<?php echo $row_voucher['image']; ?>);"></a>
              <div class="text p-4">
                <h3><?php echo $row_voucher['name_voucher']; ?></h3>
                <h5 class="text-center">Point >= <?php echo $row_voucher['point']; ?></h5>
                <p><?php echo $row_voucher['detail_voucher'];?></p>
                <p class="price"><span><?php echo $row_voucher['percent'];?></span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Reward</a></p>
              </div>
            </div>
          </div>

          <?php  } ?>
        </div>
      </div>

      
      </div>
    </section>
<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?>        