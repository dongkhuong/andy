<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?>    
    <section class="ftco-section contact-section">
          <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $preview_text = $_POST['preview_text'];
            $id_food= $_POST['id_food'];
            $id_cat= $_POST['id_cat'];
            $id_owner = $_POST['id_owner'];
            if($_FILES['image']['name'] != ''){
                $ar_ex_name = explode('.',$_FILES['image']['name']);
                $tail_name = end($ar_ex_name);
                $new_pic_name = 'restaurant-'.time().'.'.$tail_name;
                $tmp_name = $_FILES['image']['tmp_name'];
                $path_upload = $_SERVER['DOCUMENT_ROOT'].'/andy/files/'.$new_pic_name;
                $move_upload = move_uploaded_file($tmp_name,$path_upload);
            }
            $qAddRestaurant = "INSERT INTO restaurant(name, address,image,preview_text,id_food,id_cat,id_owner) VALUES ('$name','$address','$new_pic_name','$preview_text',$id_food,$id_cat,$id_owner)";
            echo $qAddRestaurant;
            $rsAddRestaurant= $mysqli->query($qAddRestaurant);
            if($rsAddRestaurant){
                header('Location:/andy/admin/restaurant/?msgsuccess=Add Successful!');
                die();
            }else{
                echo '<p>Có lỗi trong quá trình xử lý!</p>';
                die();
            }
        }
    ?>
      <div class="container mt-5">
        <div class="row block-9">
          <div class="col-md-12 ftco-animate">
            <form method="post" class="contact-form" enctype='multipart/form-data'>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Restaurant Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Restaurant Address">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" name="image">
              </div>  
              <div class="form-group">
                <textarea name="preview_text" id="" cols="30" rows="7" class="form-control" placeholder="Preview text"></textarea>
              </div>
               <div class="form-group">
                  <div class="form-group">
                  <label for="id_food">Food Name</label>
                  <select name="id_food" class="form-control">
                    <?php 
                          $sql_food = "SELECT * FROM food";
                          $rs_food = $mysqli->query($sql_food);
                          while($row_food = $rs_food->fetch_assoc()){
                       ?>
                    <option value="<?php echo $row_food['id_food']?>"><?php echo $row_food['name']?></option>
                  <?php } ?>
                  </select>
                </div>
                </div>
              <div class="form-group">
                  <div class="form-group">
                  <label for="id_cat">Cat Name</label>
                  <select name="id_cat" class="form-control">
                    <?php 
                          $sql_cat = "SELECT * FROM cat";
                          $rs_cat = $mysqli->query($sql_cat);
                          while($row_cat = $rs_cat->fetch_assoc()){
                       ?>
                    <option value="<?php echo $row_cat['id_cat']?>"><?php echo $row_cat['name_cat']?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <div class="form-group">
                  <label for="id_owner">Owner Restaurant Name</label>
                  <select name="id_owner" class="form-control">
                    <?php 
                          $sql_owner = "SELECT * FROM users WHERE id_role = 3";
                          $rs_owner = $mysqli->query($sql_owner);
                          while($row_owner = $rs_owner->fetch_assoc()){
                       ?>
                    <option value="<?php echo $row_owner['id_user']?>"><?php echo $row_owner['fullname']?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
             <div class="form-group">
                <input type="submit" value="Add Restaurant" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div id="map"></div>
<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?> 