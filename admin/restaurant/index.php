<?php require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/header.php'; ?>      
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/navbar.php'; ?>      
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/sidebar.php'; ?>      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-sm-6">
                <a href="/admin/news/add.php" class="btn btn-success btn-md">Thêm</a>
            </div>
            <div class="col-sm-6">
              <form action ="" method ="POST">
              <div class="input-group">
              <input type="text" name="search_text" id="search_text" placeholder="Nhập tin cần tìm " class="form-control" />
              <input type="submit" name="searchbutton" value="Tìm kiếm" class="btn btn-primary btn-sm">
              </div>
              </form>
              <?php 
              $text_search="";
              if(isset($_POST['searchbutton'])){
                  $text_search = $_POST['search_text'];
              }
              ?>
            </div>
            </div>
            <br/>
            <?php
            if(isset($_GET['msg'])){
        ?>
        <div class="alert alert-warning alert-dismissible text-center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Warning</strong>!</strong> <?php echo $_GET['msg']; ?>
        </div>
        <?php
            }
        ?>
        <?php
            if(isset($_GET['msgsuccess'])){
        ?>
        <div class="alert alert-success alert-dismissible text-center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Congratulation</strong>!</strong> <?php echo $_GET['msgsuccess']; ?>
        </div>
        <?php
            }
        ?>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card ">
                <div class="card-header ">Hoverable Table</div>
                <div id="result_search">
                <div class="card-body ">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID Restaurant</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Images</th>
                          <th>Preview Text</th>
                          <th>Content</th>
                          <th>Active</th>
                          <th>Counter</th>
                          <th>ID Food</th>
                          <th>ID Cat</th>
                          <th>ID Owner</th>
                          <th>Trạng thái</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $sqlNews = "SELECT * FROM news WHERE new_name LIKE CONCAT('%',CONVERT('{$text_search}',BINARY),'%')";
                          $rs = $mysqli->query($sqlNews);
                          $total = mysqli_num_rows($rs);
                          $row_count = ROW_COUNT;
                          $total_page = ceil($total / $row_count);
                          $current_page=1;
                          if(isset($_GET['page'])){
                              $current_page = $_GET['page'];
                          }
                          $offset = ($current_page - 1) * $row_count;
                          $queryNews = "SELECT new_id, new_name, cat.cat_name AS cat_name,picture ,counter, active FROM news INNER JOIN cat ON cat.cat_id = news.cat_id WHERE new_name LIKE CONCAT('%',CONVERT('{$text_search}',BINARY),'%')  ORDER BY new_id DESC LIMIT {$offset},{$row_count}";
                          $resultNews = $mysqli->query($queryNews);
                          while($arNews = mysqli_fetch_assoc($resultNews)){
                              $id = $arNews['new_id'];
                              $new_name = $arNews['new_name'];
                              $cat_name = $arNews['cat_name'];
                              $picture = $arNews['picture'];
                              $counter = $arNews['counter'];
                              $active = $arNews['active'];
                              $urlDel = "/admin/news/del.php?id={$id}&page={$current_page}";
                              $urlEdit = "/admin/news/edit.php?id={$id}&page={$current_page}";
                      ?>
                          <tr>
                              <td><?php echo $id ?></td>
                              <td><?php echo $new_name ?></td>
                              <td><?php echo $cat_name ?></td>  
                              <td class="text-center">
                                  <?php
                                      if($picture != ''){
                                  ?>
                                  <img src="/files/<?php echo $picture ?>" alt="" height="90px" width="90px">
                                  <?php
                                      }else{
                                  ?>
                                      <strong>Không có hình</strong>
                                  <?php
                                      }
                                  ?>
                              </td>                               
                              <td class="text-center"><?php echo $counter ?></td>                         
                              <?php
                                  if($active == 1){
                                      $img = "active.gif";
                                  }else{
                                      $img = "deactive.gif";
                                  }
                              ?>
                              <td class="text-center">
                                  <a href="javascript:void(0)" class="active" active="<?php echo $active; ?>" id="<?php echo $id; ?>"><img src="/templates/admin/images/<?php echo $img; ?>" alt="<?php echo $img; ?>" width="16px" height="16px" /></a>
                              </td>

                              <td class="center">
                                  <a href="<?php echo $urlEdit ?>" title="Sửa" class="btn btn-primary btn-sm"><i class="fa fa-edit "></i> Sửa</a>
                                  <a href="<?php echo $urlDel ?>" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Xóa</a>
                              </td>
                          </tr>
                          <?php
                              }
                          ?>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="card-footer bg-light text-center">
                      <div class="row">
                                <div class="col-sm-6" style="text-align: left;">

                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <ul class="pagination">
                                            <?php
                                                for($i = 1; $i <= $total_page; $i++){
                                                    $active = '';
                                                    if($i == $current_page){
                                                        $active = 'active';
                                            ?>
                                            <li class="btn btn-outline-secondary <?php echo $active ?>">Trang <span><?php echo $i ?></span></li>
                                            <?php            
                                                    }else{
                                            ?>
                                            <li class="btn btn-outline-secondary <?php echo $active ?>"><a href="/admin/news/index.php?page=<?php echo $i ?>">Trang <?php echo $i ?></a></li>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="row">

          </div>
            <script type="text/javascript">
           $(document).ready(function($) {
            $(".active").click(function(){
            var vitri = $(this);
            var id = $(this).attr("id");
            var active = $(this).attr("active");
            if(active == 1){
                $(this).attr("active", 0);
            }else{
                $(this).attr("active", 1);
            }
            $.ajax({
                url: '/admin/ajax/ajaxactivenews.php',
                type: 'get',
                cache: false,
                data: {
                    aid: id,
                    aactive: active
                },
                success: function(data){
                    $(vitri).children("img").attr("src", data);
                },
                error: function(){
                    alert("Có lỗi xảy ra");
                }
            })
        });    
    });    
    </script>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/andy/templates/admin/inc/footer.php'; ?>      