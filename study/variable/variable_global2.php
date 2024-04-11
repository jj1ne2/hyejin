<?php
    $test = 1;
    function get_arguments(){ 
        $test = 2;
        print $test; // 지역 변수가 출력
    }
    
    get_arguments();
    echo $test; // 전역 변수가 출력
?>