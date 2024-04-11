<?php
    session_start();
    $id = 'egoing';
    $pwd = 'codingeverybody';
    if(!empty($_POST['id']) && !empty($_POST['pwd'])){
        if($_POST['id'] == $id && $_POST['pwd'] == $pwd){
            $_SESSION['is_login'] = true; // 세션에 is_login라는 이름으로 true 저장
            $_SESSION['nickname'] = '이고잉'; // 세션에 nickname이라는 이름으로 "이고잉" 저장
            header('Location: ./session03_page.php'); // 페이지 이동 (redirect)
            exit;
        }
    }
    // 아이디 및 비밀번호가 틀릴 경우
    echo '로그인하지 못했습니다.';
?>