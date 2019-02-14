<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?>    


    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
			<div class="col-md-4 contact-info ftco-animate">
				<div class="row">
                <img src=”..//admin/images/bg_1.jpg”  height=”50″ width=”50″ />
				<div class="col-md-12 mb-4">
	        </div>
			</div>
			</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
                    <?php
                      
                      $user = "SELECT * FROM users WHERE id_user = 6";
                      $rsuser= $mysqli->query($user);
                      $row_user = $rsuser->fetch_assoc();
                   
                      
                      
                      ?>
	                <div class="form-group">
                      Name :<?php  echo $row_user['fullname']; ?>
                     
	                </div>
                </div>
              </div>
              <div class="form-group">
                Email :
              </div>
              <div class="form-group">
                Point :
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div id="map"></div>
<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?> 