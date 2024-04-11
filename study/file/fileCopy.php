<?php
    $file = 'filefile.txt';
    $newfile = 'example.txt.bak'; // 복사될 결과

    // copy() : 파일 복사
    
    if (!copy($file, $newfile)) { // 원본 파일명, 원본 파일을 복사한 파일명
            // 함수의 return값이 true라면 복사 성공
        echo "failed to copy $file...\n"; //  해당 함수는 !가 있기 때문에 복사가 실패했을 때 해당 문구를 출력
    }
?>