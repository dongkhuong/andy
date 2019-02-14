<?php 
session_start();
echo "Chào mừng <span style='color:red;font-weight:bold'>".$_SESSION['arUser']['fullname']."</span> đến với trang web của chúng tôi <br/>";
echo "<a href='/andy/auth/'>Trở về</a>"
?>