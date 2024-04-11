<?php
    // 대개 배열의 인덱스는 0, 1, 2, .. 처럼 숫자지만 연관 배열에서는 first, second, third, .. 처럼 영어를 사용한다
    
    // 배열 생성법 1
    $grades = array('egoing'=>10, 'k8805'=>6, 'sorialgi'=>80);
    var_dump($grades);
    echo $grades['egoing']; // 특정 키의 값 불러오기
    echo "<hr/>";

    // 배열 생성법 2
    $grades = [];
    $grades['egoing'] = 10;
    $grades['k8805'] = 6;
    $grades['sorialgi'] = 80;
    var_dump($grades);
    echo "<hr/>";
    
    // 인덱스가 영어일 때 돌아가는 반복문
    $grades = array('egoing'=>10, 'k8805'=>6, 'sorialgi'=>80);
    foreach($grades as $key => $value){ // grades에서 반복문이 돌 때마다 key값에 키를 넣고, value에 값을 넣어 줌
        echo "key: {$key} value:{$value}<br />";
    }
?>