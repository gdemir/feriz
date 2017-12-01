<?php

class CaptchaHelper {

  public static function init() {

    // rastgele bir parolar belirle
    $code = rand(10000, 99999);
    //$_SESSION["captcha_code"] = $code;
    $im = imagecreatetruecolor(50, 24);
    // background color blue
    $bg = imagecolorallocate($im, 91, 192, 222);
    // text color white
    $fg = imagecolorallocate($im, 255, 255, 255) ;
    imagefill($im, 0, 0, $bg);
    imagestring($im, 5, 5, 5,  $code, $fg);
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Content-Type: image/png");
    imagepng($im);
    imagedestroy($im);
    return $code;
    exit;
  }

}

?>