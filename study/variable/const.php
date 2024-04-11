<html>
<body>
<?php
    // 상수: 변하지 않음
    // define(): 상수를 선언할 때 사용
    define('TITLE', 'PHP Tutorial'); 
    echo TITLE;
    define('TITLE', 'JAVA Tutorial');

    // TITLE: 상수이기 때문에 값을 PHP Tutorial에서 JAVA Tutorial로 변경하려고 하면 에러
?>
</body>
</html>