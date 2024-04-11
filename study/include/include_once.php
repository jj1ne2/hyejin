<?php
    /*
        include: 같은 파일 여러 번 포함 가능 / 포함할 파일이 없어도 다음 코드 실행
        include_once: 같은 파일 한 번만 포함 / 포함할 파일이 없어도 다음 코드 실행
        require: 같은 파일 여러 번 포함 가능 / 포함할 파일이 없으면 다음 코드 실행하지 않음
        require_once: 같은 파일 한 번만 포함 / 포함할 파일이 없으면 다음 코드 실행하지 않음
    */

    include_once 'include_file.php';
    include_once 'include_file.php';
    include_once 'include_file.php';
    include_once 'include_file.php';
    include_once 'include_file.php';
    // 여러 번 include_once 해도 한 번만 실행됨
?>
