<?php
    $subject = 'coding everybody http://naver.com egoing@egoing.com 010-0000-0000';
    // preg_match('/c...../', $subject, $match);
    // preg_match('~http://\w+\.\w+~', $subject, $match);
    // 세 번째 인자는 딱히 선언할 필요도 없이 그냥 적어 주면 preg_match()가 내부적으로 해당 변수를 생성해서 검색 결과를 채워 넣어 줌
    // \w: 문자
    // +: 하나 이상
    
    preg_match('~(http://\w+\.\w+)\s(\w+@\w+\.\w+)~', $subject, $match); // preg_match('정규표현식', 검색할 문자, 검색 결과)
    // (): 캡처링, 독립된 구조로 사용할 수 있음
    var_dump($match);
    echo "<br/>";
    echo "홈페이지: ".$match[1];
    echo "<br/>";
    echo "이메일: ".$match[2];
?>