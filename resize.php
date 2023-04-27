<?php
    // サムネイルの幅
    $new_width = 200;

    // 元画像の縦横サイズを取得
    list ($width, $height) = getimagesize($_FILES["file"]["tmp_name"]);

    // 画像のサイズ比率を計算
    $rate = $new_width / $width;
    $new_height = $rate * $height;

    // サムネイルでキャンバスを作成する
    $canvas = imagecreatetruecolor($new_width, $new_height);

    // アップした画像の拡張子によって新ファイル名と画像の読み込み方を変える
    switch (exif_imagetype($_FILES["file"]["tmp_name"])){
        // JPEG
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($canvas, "images/new_image.jpeg");
            break;

        // GIF
        case IMAGETYPE_GIF:
            $image = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagegif($canvas, "images/new_image.gif");
            break;

        // PNG
        case IMAGETYPE_PNG:
            $image = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagepng($canvas, "images/new_image.png");
            break;
            
        // 画像以外のファイルのとき
        default:
            exit();
    }
    imagedestroy($image);
    imagedestroy($canvas);
?>