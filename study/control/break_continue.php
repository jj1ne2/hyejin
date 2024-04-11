<html>
<body>
<?php
    // break: 조건을 만나면 반복문 아예 탈출
    for($i = 0; $i < 10; $i++){
        if($i === 5){
            break;
        }
        echo "coding everybody{$i}<br />";
    }

    // continue: 반복문 진행은 계속되지만 조건을 만나면 건너뜀
    for($i = 0; $i < 10; $i++){
        if($i === 5){
            continue;
        }
        echo "coding everybody{$i}<br />";
    }
?>
</body>
</html>