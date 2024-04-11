<?php
    // 문자열 표기 방법
    echo "hello world<br/>";
    echo 'hello world';
    echo "<hr/>";
    
    echo "hello 'world'<br/>";
    echo 'hello "world"';
    echo "<hr/>";
    
    // 줄 바꿈
    echo "hello world\n<br/>"; // 소스 코드 줄 바꿈
    echo 'hello world\n'; // '' 안에서는 기호를 문자 그대로 표기하기 때문에 \n이라는 문자가 출력됨
    echo "<hr/>";

    // 변수 사용 방법
    $a = array('hello', 'world');
    echo "생활코딩의 공식인사는 {$a[0]} {$a[1]}입니다<br/>";
    echo '생활코딩의 공식인사는 '.$a[0].' '.$a[1].'입니다'; // ''는 문자를 그대로 해석하기 때문에 중괄호 제거+문자열 연결 연산자(.)를 사용
?>