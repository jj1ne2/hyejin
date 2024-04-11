<?php
$dbh = new PDO('mysql:host=localhost;dbname=opentutorials;charset=utf8', 'root', 'secret');
switch($_GET['mode']){ // GET으로도 전송했기 때문에 GET방식으로 받을 수가 있음
    case 'insert':
        $stmt = $dbh->prepare("INSERT INTO topic (title, description, created) VALUES (:title, :description, now())");
        // ->: 객체나 클래스의 멤버나 메소드에 접근하기 위한 연산자
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':description',$description);
 
        $title = $_POST['title'];
        $description = $_POST['description'];
        $stmt->execute();
        header("Location: 03.php"); 
        break;

    case 'delete':
        $stmt = $dbh->prepare('DELETE FROM topic WHERE id = :id');
        $stmt->bindParam(':id', $id);
 
        $id = $_POST['id'];
        $stmt->execute();
        header("Location: 03.php"); 
        break;

    case 'modify':
        $stmt = $dbh->prepare('UPDATE topic SET title = :title, description = :description WHERE id = :id');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
 
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];
        $stmt->execute();
        header("Location: 03.php?id={$_POST['id']}");
        break;
}
?>