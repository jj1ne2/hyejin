<html>
<body>
<?php
    for($i = 0; $i < 10; $i++){ // 1. 처음 바깥쪽 for문이 실행된 후    
                                // 3. 안쪽 for문이 끝나고 나면 다시 바깥쪽 for문 실행된 후 또 안쪽 for문이 끝나기 전까지는 실행 X
        for($j = 0; $j < 10; $j++){ // 2. 안쪽 for문이 다 돌기 전까지는 안쪽 for문만 실행 
            echo "coding everybody{$i}{$j}<br />";
        } 
    }
?>
</body>
</html>