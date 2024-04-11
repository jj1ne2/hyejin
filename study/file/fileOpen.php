<?php
    // fopen(읽거나 쓰고자 하는 파일의 경로, 모드) : 파일을 연 후 읽거나 쓰기
    // fread, fwrite 등과 같이 쓰임

    /*
        모드
        r  : 읽기 
        r+ : 읽고 쓰기 (파일 포인터가 파일 처음에 위치)
        w  : 
        w+ : 
        a  : 쓰기 (파일 포인터가 맨끝에 위치) 
        a+ : 
        x  :
        x+ :
        c  :
        c+ :
    */
    
    $fname = "writeGo.txt";
    $file = fopen($fname, "r");
    $content = fread($file, filesize($fname));
    echo $content;
    fclose($file);