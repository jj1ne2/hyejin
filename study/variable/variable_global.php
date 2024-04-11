<?php
    $test = 1;
    function get_arguments(){ // 변수의 기본값 설정
        global $test; // 전역 변수를 사용하기 위해서는 global을 붙여 줘야 함
        $test = 2;
    }
    
    get_arguments();
    echo $test; // global이 없다면 $test = 1;이 출력될 것
?>