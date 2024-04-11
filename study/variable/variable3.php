<html>
<body>
<?php
   $a = 100; 
   echo gettype($a); // 변수 a의 자료형 얻어내기
   settype($a, 'double');  // 변수 a의 자료형 변경
   echo "<br/>";
   echo gettype($a);
   settype($a, 'int');

   // 아래와 같이 응용 가능
   if(is_int($a)) {
    echo $a+2;
   }
?>
</body>
</html>