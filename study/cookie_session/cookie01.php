<?php
    // 쿠키: 클라이언트(브라우저)에 데이터 저장
    setCookie('cookie1', '생활코딩'); // cookie1이라는 생활코딩이라는 값이 브라우저에 저장됨 (키, 값)
    setCookie('cookie2', time(), time()+60); // time(): 현재 시간, +60: 60초 이후
    // setCookie('cookie2', 값, 60초 후에 삭제됨);
    // setCookie(쿠키 이름, 값, 만료 기간, 어떤 경로에서 실행하는지, 도메인, ...)

    // 쿠키: 유출되어도 이상 없는, 보안상 신뢰할 수 없는 데이터 (로그인 정보를 절대 쿠키에 저장하면 안 됨 -> 쿠키를 훔쳐보거나 가져갈 수 있기 때문에)
?>