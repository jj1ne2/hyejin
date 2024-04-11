<?php
    /*
        include: 같은 파일 여러 번 포함 가능 / 포함할 파일이 없어도 다음 코드 실행
        include_once: 같은 파일 한 번만 포함 / 포함할 파일이 없어도 다음 코드 실행
        require: 같은 파일 여러 번 포함 가능 / 포함할 파일이 없으면 다음 코드 실행하지 않음
        require_once: 같은 파일 한 번만 포함 / 포함할 파일이 없으면 다음 코드 실행하지 않음

        include와 require의 차이점
         - require : 오류가 발생할 때 Fatal Error가 되어 처리가 정지됨
         - include : 오류가 발생할 때 Warning을 출력을 하고 처리 코드를 실행
    */

    include 'include_file.php';
    include 'include_file.php';
    include 'include_file.php';
    include 'include_file.php';

?>
