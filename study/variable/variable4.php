<html>
<body>
<?php
  // 가변 변수
  $title = "subject";
  $$title = "PHP tutorial"; // $$title중 $"$title": subject, 즉 $subject가 됨
  // $subject = "PHP tutorial";

  echo $subject;
?>
</body>
</html>