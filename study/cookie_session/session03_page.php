<?php
session_start();
if(!isset($_SESSION['is_login'])){ // 로그인 검증
    header('Location: ./session03_login.php'); // 로그인되어 있지 않을 때 보내는 화면
}
?>
<html>
    <body>
        <?php echo $_SESSION['nickname'];?>님 환영합니다<br />
        <a href="./session03_logout.php">로그아웃</a>    
    </body>
</html>
  