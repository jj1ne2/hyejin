<?php
    echo $_COOKIE['cookie1']."<br />";
    echo time()-$_COOKIE['cookie2']; // 60초 후에 소멸하는 쿠키를 생성했기 때문에 60초가 지나가면 오류 발생
?>