<?php 
    // 01: boolean의 대체제
    // 0: false, 0이 아닌 숫자: true

    if (1 and 1) {
        echo 1;
    }
    if (1 and 0) {
        echo 2;
    }
    if (0 and 1) {
        echo 3;
    }
    if (0 and 0) {
        echo 4;
    }
?>