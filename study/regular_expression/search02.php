<?php
    // 워드 바운더리
    // b: 단어의 경계, /b로 둘러싸인 독립된 단어를 검색하고 싶을 때 사용
    
    // web이라는 단어를 검색하려고 한다
    if (preg_match("/\bweb\b/i", "PHP is the web scripting language of choice.")) { // 1 = true
        echo "A match was found.";
    } else {
        echo "A match was not found.";
    }
     
    // website라는 단어가 아닌 web을 검색하고 싶음
    if (preg_match("/\bweb\b/i", "PHP is the website scripting language of choice.")) { // 0 = false
        echo "A match was found.";
    } else {
        echo "A match was not found.";
    }
?>