<?php
    $string = 'April 15, 2003';
    $pattern = '/(\w+) (\d+), (\d+)/i';
    
    // ${번호} : 순번에 해당하는 정규 표현식
    // $번호 : 순번에 해당하는 정규 표현식
    $replacement = '${1} 1, $3'; // April1,2003
    echo preg_replace($pattern, $replacement, $string);
?>