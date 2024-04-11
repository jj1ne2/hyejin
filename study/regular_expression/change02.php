<?php
    $string = 'The quick brown fox jumped over the lazy dog.';

    $patterns = array();
    $patterns[0] = '/quick/';
    $patterns[1] = '/brown/';
    $patterns[2] = '/fox/';
    
    $replacements = array();
    $replacements[0] = 'slow';
    $replacements[1] = 'black';
    $replacements[2] = 'bear';

    /*
        만약 배열의 값을 아래 순서로 초기화했다면 출력되는 값은 The bear black slow jumped over the lazy dog.임
        $replacements[2] = 'bear';
        $replacements[1] = 'black';
        $replacements[0] = 'slow';
         ->  php는 인덱스 값의 순서에 따라서 치환을 하는 것이 아니고, 배열의 값이 생성된 순서대로 치환을 하기 때문
    */
    
    echo preg_replace($patterns, $replacements, $string);
?>