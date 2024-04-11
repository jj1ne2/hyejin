<html>
<body>
<?php
   echo (100+10)."<br/>";
   echo ((100+10)/10)."<br/>";
   echo (((100+10)/10)-10)."<br/>";
   echo ((((100+10)/10)-10)*10)."<br/>";

   echo "<br/>";

   // 위와 동일한 코드를 변수 사용하여 표현
   $a = 10000; // 값 변경
   $a = $a + 10;
   print $a."<br/>";
   
   $a = $a / 10;
   print $a."<br/>";
   
   $a = $a - 10;
   print $a."<br/>";
   
   $a = $a * 10;
   print $a."<br/>";
?>
</body>
</html>