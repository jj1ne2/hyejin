<?php
    // Load the stamp and the photo to apply the watermark to
    $stamp = imagecreatefrompng('1798.png');
    $im = imagecreatefrompng('1799.png');
    
    // Set the margins for the stamp and get the height/width of the stamp image
    $marge_right = 10; // 넣어 줄 margin
    $marge_bottom = 10; // 넣어 줄 margin
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    
    // Copy the stamp image onto our photo using the margin offsets and the photo 
    // width to calculate positioning of the stamp. 
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
    
    // Output and free memory
    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
?>