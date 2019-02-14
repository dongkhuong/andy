<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?> 
		<section class="ftco-appointment">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
	    		<div class="col-md-12 appointment ftco-animate">
	    			<h3 class="mb-3">Add Bill</h3>
            <?php
            if(isset($_POST['submit'])){
            $id_customer = $_POST['id_customer'];
            $price = $_POST['price'];
            $qAddBill = "INSERT INTO bill(id_user,price) VALUES ($id_customer,$price)";
            echo $qAddBill;

            # $pointCong = price / 1000;

            # $qUpdateBill = "UPDATE users SET point = point + $pointCong where id_user = $id_customer";

            $rsAddBill= $mysqli->query($qAddBill);
            if($rsAddBill){
                header('Location:/andy/admin/bill/?msgsuccess=Thêm hóa đơn thành công!');
                die();
            }else{
                echo '<p>Có lỗi trong quá trình xử lý!</p>';
                die();
            }
              }
            ?>
	    			<form action="#" class="appointment-form" method="POST">
	    				<div class="d-md-flex">
		    				<div class="form-group">
                <label for="id_customer">Customer Name</label>
                  <select name="id_customer" class="form-control" required>
                    <?php 
                          $sql_user = "SELECT * FROM users WHERE id_role = 2";
                          $rs_user = $mysqli->query($sql_user);
                          while($row_user = $rs_user->fetch_assoc()){
                       ?>
                    <option value="<?php echo $row_user['id_user']?>"><?php echo $row_user['fullname']?></option>
                  <?php } ?>
                  </select>  
		    				</div>
	    				</div>
	    				<div class="d-me-flex">
	    					<div class="form-group">
		    					<input type="text" name="price" class="form-control" placeholder="Price">
		    				</div>
	    				</div>
	            <div class="form-group">
	              <input type="submit" value="Send" name="submit" class="btn btn-primary py-3 px-4">
	            </div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    </section> 
<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?> 