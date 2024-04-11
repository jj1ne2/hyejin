<?php
    // 쿠키와 세션의 공통점: 사용자의 정보를 브라우저에 저장한다
    // 세션: 현재 이것이 누구인지 식별할 수 있는 식별자만을 브라우저에 저장하고, 실질적인 데이터는 서버의 파일이나 db로 저장함
        // 식별자: SID(session ID)
    // 쿠키: 모든 정보를 브라우저에 저장 (데이터 유출의 위험) 

    session_save_path('./session'); // 대부분 사용하지 않음
    // 세션을 저장할 때 어떠한 값을 모든 페이지에서 가져오고 싶을 때 어디에 그 파일이 저장될 것인가 지정해 주는 함수
    session_start(); // 세션을 사용하는 경우 로직 초입에 작성해야 함
    $_SESSION['title'] = '생활코딩';
?>