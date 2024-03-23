<?php
    $host = 'localhost';
    $username = 'root';
    $password = '1111';
    $database = 'classicmodels';
    
    $connect = mysqli_connect($host, $username, $password, $database) or die("MySQL 연결 실패: " . mysqli_connect_error());
    
    mysqli_query($connect, "set names utf8"); // 한글 결과값을 위한 설정

    if ($connect->connect_error) {
        die("MySQL 연결 실패: " . mysqli_connect_error());
    }
    
    echo "MySQL 연결 성공<br>";

    $sql = "SELECT * FROM customers";
    $rs = mysqli_query($connect, $sql); // SQL 실행
    
    if ($rs) {
        // 결과가 있는 경우에만 반복문 실행
        while ($info = mysqli_fetch_array($rs)) {
            echo $info['customerName'] . ", " . $info['phone'] . "<br>";
        }
    } else {
        // 쿼리 실행에 실패한 경우 에러 메시지 출력
        echo "쿼리 실행 실패: " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
    
?>
