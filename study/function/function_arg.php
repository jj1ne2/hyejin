<?php
    function get_arguments($arg1=100){ // 변수의 기본값 설정
        return $arg1;
    }

    echo get_arguments(1); // 인자를 넣어 주면 기본값을 사용하지 않고 인자로 넣어 준 값을 사용함
    echo ',';
    echo get_arguments(); // 인자가 따로 없기 때문에 기본값 사용
?>