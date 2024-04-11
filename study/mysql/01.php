<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>   
    <body>
        <form action="./02.php?mode=insert" method="POST"> 
            <!-- action에 인자를 같이 넘겨 줌으로써 GET방식으로 데이터를 전송하는 동시에  method를 POST로 지정해서 POST로도 전송함 -->
            <!-- GET, POST의 병행이 가능 -->
            <p>제목 : <input type="text" name="title"></p>
            <p>본문 : <textarea name="description" id="" cols="30" rows="10"></textarea></p>
            <p><input type="submit" /></p>            
        </form>
    </body>
</html>