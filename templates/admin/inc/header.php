<?php ob_start(); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/andy/utils/DBConnectionUtil.php'; ?>  
<?php session_start(); 
if(!isset($_SESSION['arUser'])){
 header('location:/andy/auth');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ANDY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="/andy/templates/admin/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/animate.css">
    
    <link rel="stylesheet" href="/andy/templates/admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/magnific-popup.css">

    <link rel="stylesheet" href="/andy/templates/admin/css/aos.css">

    <link rel="stylesheet" href="/andy/templates/admin/css/ionicons.min.css">

    <link rel="stylesheet" href="/andy/templates/admin/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/andy/templates/admin/css/flaticon.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/icomoon.css">
    <link rel="stylesheet" href="/andy/templates/admin/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
       <a href="#"><img src="http://taochu.trangnhat.net/gen/gimg/6/a.gif" border="0"></a> <a href="#"><img src="http://taochu.trangnhat.net/gen/gimg/6/n.gif" border="0"></a> <a href="#"><img src="http://taochu.trangnhat.net/gen/gimg/6/d.gif" border="0"></a> <a href="#"><img src="http://taochu.trangnhat.net/gen/gimg/6/y.gif" border="0"></a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Restaurant</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>        
            <?php if(isset($_SESSION['arUser'])){?>
            <li class="nav-item active"><a href="/andy/admin/user/profile.php" class="nav-link"><?php echo $_SESSION['arUser']['fullname']; ?></a></li>
            <li class="nav-item"><a href="/andy/auth/logout.php" class="nav-link">Logout</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->