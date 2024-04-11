<?php
    $str = 'foobar: 2008';
    
    preg_match('/(?P<name>\w+): (?P<digit>\d+)/', $str, $matches);
    // ?P<name>: 배열 안에 있는 키 값 중 name
    // ?P<digit>: 배열 안에 있는 키 값 중 digit

    print_r($matches);
?>