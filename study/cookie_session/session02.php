<?php
    ini_set("display_errors", "1");
    session_save_path('./session');
    session_start(); // 세션이 사용되는 곳에서는 꼭 시작해 줘야 함
    echo $_SESSION['title']; // session01에서 저장된 title이 출력될 것임
    echo file_get_contents('./session/sess_'.session_id()); // 현재 사용되고 있는 세션의 sessionID값을 출력
    echo session_id();
?>