<?php
    $var = 10; // 전역 변수

    function varFunc() {
        // $var = 10; // 지역 변수로 선언
        global $var; // 전역 변수를 사용할 때 명시해 줘야 오류가 안 뜸
        echo "함수 내부에서 호출한 지역 변수 var의 값은 {$var}입니다.\r\n<br>";
    }

    varFunc();
    echo "함수 밖에서 호출한 지역 변수 var의 값은 {$var}입니다.<br>"; // 지역 변수를 호출하려 하면 오류가 뜸

    echo "테스트<br><br><br><br>";
    varFunc();
?>
