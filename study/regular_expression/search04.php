<?php
    // 링크에서 php.net 추출
    preg_match('@^(?:http://)?([^/]+)@i',
        "http://www.php.net/index.html", $matches);
    // ^ : 어떤 문자열의 시작점, [] 안에 들어간다면 not을 의미함
    // ?: : 결과값에 담기지 않음
    // ? : 0~1, 하나도 없거나 하나인 경우 -> (?:http://)가 하나도 없거나 하나인 경우

    print_r($matches);
    $host = $matches[1];
    
    preg_match('/[^.]+\.[^.]+$/', $host, $matches); // 현재 문자 출력 형태가 문자.문자인 상태인데 $로 인해 php.net이 출력됨
    // $ : 어떤 문자열의 끝점

    echo "domain name is: {$matches[0]}\n";
?>