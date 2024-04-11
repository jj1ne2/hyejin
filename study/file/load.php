<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>   
<body>
<?php
    var_dump($_FILES);
    // exit; // 밑에 오는 것들은 하나도 수행하지 않고 그대로 php문 탈출

    ini_set("display_errors", "1");
    $uploaddir = 'C:\APM\Apache24\htdocs\backend_test_hwang\study\file\upload\\'; // 임시 디렉토리에서 이동시키려고 하는 파일 디렉토리의 경로
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']); // 어느 파일 디렉토리에 어느 이름으로 저장되어 있는가
    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { // tmp_name: 임시 이름
            // 클라이언트가 파일을 전송하면 그 파일은 무조건 임시 디렉토리 안에 들어가게 됨 -> 임시 디렉토리에 있는 파일을 원하는 디렉토리로 이동시켜야 함
            // tmp_name? 임시 디렉토리상의 경로
        echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
    } else {
        print "파일 업로드 공격의 가능성이 있습니다!\n";
    }
    echo '자세한 디버깅 정보입니다:';
    print_r($_FILES);
    print "</pre>";
?>
<img src="upload/<?=$_FILES['userfile']['name']?>"/>
</body>
</html>