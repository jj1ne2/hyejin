<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>HTML with PHP</title>
</head>
<body>
    <h3>배열 연습</h3>
    <?php
        // 키와 값을 사용하여 배열 초기화 가능
        $names = array("first"=>"first", "second"=>"second", "third"=>"third", "fourth"=>"fourth");

        echo "배열 출력<br/>";
        echo "{$names['first']}", "{$names['second']}", "{$names['third']}", "{$names['fourth']}";
    ?>
</body>
</html>