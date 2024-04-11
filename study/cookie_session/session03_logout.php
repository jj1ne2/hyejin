<?php
    ini_set("display_errors", "1");
    session_start();
    session_destroy(); // 세션에 저장되어 있는 모든 데이터 삭제
    header('Location: ./session03_login.php');
?>