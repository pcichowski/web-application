<?php

function &resize_image($path, $new_width, $new_height, $original_name, $mime_type){
    if($mime_type === 'image/png'){
        $original = imagecreatefrompng("$path");
    }
    else if($mime_type === 'image/jpeg'){
        $original = imagecreatefromjpeg("$path");
    }
    else{
        throw new Exception('Bledne rozszerzenie zdjecia');
    }

    $wd = imagesx($original);
    $ht = imagesy($original);
    $resized = imagecreatetruecolor($new_width, $new_height);

    imagecopyresampled($resized, $original, 0, 0, 0, 0, $new_width, $new_height, $wd, $ht);

    imagepng($resized, "thumbnail_" . $original_name);
    rename('thumbnail_' . $original_name, 'images/thumbnails/thumbnail_' . $original_name);

    imagedestroy($resized);
}

function &image_add_watermark($path, $original_name, $watermark_text, $mime_type){
    if($mime_type === 'image/png'){
        $source = imagecreatefrompng("$path");
    }
    else if($mime_type === 'image/jpeg'){
        $source = imagecreatefromjpeg("$path");
    }
    $width = imagesx($source);
    $height = imagesy($source);
    $watermarked = imagecreatetruecolor($width, $height);
    imagecopyresampled($watermarked, $source, 0, 0, 0, 0, $width, $height, $width, $height);
    $watermarkcolor = imagecolorallocate($watermarked, 250, 5, 50);

    //imagestring($watermarked, 5, 100, 100, $watermark_text, $watermarkcolor);
    $font = './static/arial.ttf';
    imagefttext($watermarked, 30, 30, 100, 300, $watermarkcolor, $font, $watermark_text);

    imagepng($watermarked, 'w_' . $original_name);

    rename('w_' . $original_name, 'images/watermarked/w_' . $original_name);

    imagedestroy($watermarked);
    imagedestroy($source);
}