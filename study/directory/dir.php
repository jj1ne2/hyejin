<?php
    // getcwd() : 현재 디렉토리 표시
    // chdir('경로') : 디렉토리 이동
    // scandir() : 디렉토리 탐색

    echo getcwd().'<br/>'; 
    chdir('../'); 
    echo getcwd().'<br/>';
    
    $dir = '.';
    $file1 = scandir($dir); // 인자로 1이 추가될 경우 정렬 순서를 바꿈
    $file2 = scandir($dir, 1); // 인자로 1이 추가될 경우 정렬 순서를 바꿈
    print_r($file1);
    print_r($file2);
?>