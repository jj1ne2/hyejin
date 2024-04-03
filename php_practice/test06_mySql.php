<?php
    $host = 'localhost'; // 호스트명
    $username = 'root';  // 유저 이름
    $password = '1111';  // 비밀번호
    $database = 'classicmodels'; // db명
    
    $connect = mysqli_connect($host, $username, $password, $database) // mySql 연결
    or die("MySQL 연결 실패: " . mysqli_connect_error());
    
    mysqli_query($connect, "set names utf8"); // 한글 결과값을 위한 설정

		// 연결이 안 됐다면
    if ($connect->connect_error) {
        die("MySQL 연결 실패: " . mysqli_connect_error()); 
    }
    
    // 연결 성공일 때
    echo "MySQL 연결 성공<br>";

    $sql = "SELECT * FROM customers"; // 쿼리
    $rs = mysqli_query($connect, $sql); // SQL 실행
    
    if ($rs) {
        // 결과가 있는 경우에만 반복문 실행
        while ($info = mysqli_fetch_array($rs)) {
            echo $info['customerName'] . ", " . $info['phone'] . "<br>"; // 출력할 컬럼
        }
    } else {
        // 쿼리 실행에 실패한 경우 에러 메시지 출력
        echo "쿼리 실행 실패: " . mysqli_error($connect);
    }
    
    // mySql 연결 종료
    mysqli_close($connect);
?>
