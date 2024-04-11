<?php
    // shift: 첫 번째 있는 값 제거
    // unshift: 첫 번째에 값 추가
    // push: 마지막에 값 추가
    // pop: 마지막 값 제거

    $arr = ['a', 'b', 'c', 'd', 'e'];
    array_push($arr, 'f'); // e 뒤에 값 추가
    var_dump($arr);
    echo "<hr/>";

    $li = ['a', 'b', 'c', 'd', 'e'];
    array_unshift($li,'z'); // 첫 번째인 a 앞에 값 추가
    var_dump($li);
    echo "<hr/>";

    $li = ['a', 'b', 'c', 'd', 'e', 'z'];
    array_shift($li); // 첫 번재에 있는 값 a 제거
    var_dump($li);
    echo "<hr/>";

    $li = ['a', 'b', 'c', 'd', 'e', 'z'];
    array_pop($li); // 마지막 값 z 제거
    var_dump($li);
    echo "<hr/>";

    $li = ['c','e','a','b','d'];
    sort($li); // 값을 정렬시켜 줌
    var_dump($li);
    echo "<hr/>";

    $li = ['c','e','a','b','d'];
    rsort($li); // 값을 반대로 정렬시켜 줌
    var_dump($li);
?>