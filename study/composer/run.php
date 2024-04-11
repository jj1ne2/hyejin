<?php
    require 'vendor/autoload.php';

    use Michelf\Markdown;
    
    $markdown = "# Hello, World!";
    $html = Markdown::defaultTransform($markdown);
    echo $html;
?>