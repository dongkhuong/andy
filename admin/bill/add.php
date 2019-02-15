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
            $sql_search_phone = "SELECT * FROM users WHERE phone = $id_customer";
            $rs_search_phone = $mysqli->query($sql_search_phone);
            $row_search_phone = $rs_search_phone->fetch_assoc();
            $id_cs = $row_search_phone['id_user'];

            $price = $_POST['price'];
            $qAddBill = "INSERT INTO bill(id_user,price) VALUES ($id_cs,$price)";
            $rsAddBill = $mysqli->query($qAddBill);
            $pointCong = $price / 1000;
            $qUpdateBill = "UPDATE users SET point = point + $pointCong where id_user = $id_cs";
            $rsUpdateBill= $mysqli->query($qUpdateBill);
            if($rsAddBill && $rsUpdateBill){
                header('Location:/andy/admin/bill/?msgsuccess=Tích lũy điểm thành công!');
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
                  <input type="text" name="id_customer" class="form-control" placeholder="NumberPhone" required="">
		    				</div>
	    				</div>
	    				<div class="d-me-flex">
	    					<div class="form-group">
		    					<input type="text" name="price" class="form-control" placeholder="Price" required="">
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