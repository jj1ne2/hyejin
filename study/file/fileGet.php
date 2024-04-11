<?php
    // file_get_contents() : 파일 읽기 함수
    $file = 'filefile.txt';
    echo file_get_contents($file);

    $hompage = file_get_contents('http://n.news.naver.com/article/088/0000871238?cds=news_media_pc&type=breakingnews');
        // 웹 페이지 읽기..
    echo $hompage;
?>