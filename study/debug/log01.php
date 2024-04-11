<?php
    // log: 시스템의 상태를 기록하는 행위
    // var_dump
    $a = array(1, 2, array("a", "b", "c"));
    var_dump($a);
    echo "<br/>";

    $b = 3.1;
    $c = true;
    var_dump($b, $c);

    echo "<hr/>";

    // var_export
    $a = array(1, 2, array("a", "b", "c"));
    var_export($a);
    echo "<br/>";

    $b = 3.1;
    $c = true;
    var_export($b);
    echo "<br/>";

    var_export($c);
    echo "<br/>";

    echo "<hr/>";

    // print_r
    $a = array(1, 2, array("a", "b", "c"));
    print_r($a);
    echo "<br/>";

    $b = 3.1;
    $c = true;
    print_r($b);
    echo "<br/>";

    print_r($c);
    echo "<br/>";
?>