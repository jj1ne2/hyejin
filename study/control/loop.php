<?php
    /* 
        while : 조건식이 false일 때 반복문 종료
        while(조건식) {
            실행할 내용;
        }
    */
    $i = 0;
    while($i < 5){
        echo "coding everybody{$i}<br/>";
        $i += 1;
    }

    /*
        for(초기식; 조건식; 증감식;) {
            실행할 내용;
        }
    */
    for($i = 0; $i < 10; $i++){
        echo 'coding everybody'.($i*2)."<br />";
    }

?>