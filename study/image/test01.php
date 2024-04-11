<?php
    header("Content-type: image/png"); // 제일 먼저 넣어 줘야 함, 헤더 앞에는 공백도 있어서는 안 됨
    $string = $_GET['text'];
    $im     = imagecreatefrompng("1795.png"); // png 형식의 이미지 생성
    $orange = imagecolorallocate($im, 60, 87, 156); // 이미지 식별자, R, G, B (이미지 식별자에 대한 색상)
    $px     = (imagesx($im) - 7.5 * strlen($string)) / 2; // 크기
    imagestring($im, 4, $px, 9, $string, $orange); // 이미지로 된 문자열 
    // (글자를 그리기 위한 이미지 식별자, 폰트, X축에 위치할 좌표, Y축에 위치할 좌표, 입력하고자 하는 내용, 색상)
    imagepng($im); // png 형식으로 된 이미지를 전송할 것이다 (헤더값에 의해 변경되어야 함)
    imagedestroy($im); // 지금까지 사용한 이미지 자원을 삭제
?>