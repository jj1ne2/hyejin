<?php
    // preg_match(): 첫 번째 인자로 전달된 정규 표현식으로 두 번째 인자에 들어오는 문자를 검색할 때 검색이 된다면 1, 검색이 되지 않는다면 0, 문법적인 오류가 있다면 false
    // i는 대소문자를 구분하지 않도록 해 줌
    if (preg_match("/php/i", "PHP is the web scripting language of choice.")) { // 1 = true
        echo "A match was found.";
    } else {
        echo "A match was not found.";
    }
?>