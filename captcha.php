<?php
(isset($_SESSION)) ? : session_start();
class captcha{
    public static function create(){

        $image = imagecreatetruecolor(160, 40);
        imagefilledrectangle($image, 0, 0, 160, 40, imagecolorallocate($image, 244, 245, 245));

        $code="";
        for($i=0;$i<6;$i++){ 
            $color = imagecolorallocate($image, rand(160,230), rand(160,240), rand(160,250));
            imageline($image, rand(10,140), rand(2,35), rand(10,140), rand(5,35), $color) ;
        }
        for($i=1;$i<6;$i++){
            $color = imagecolorallocate($image, rand(50,150), rand(50,140), rand(50,150));
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = $char[rand(0, strlen($char)-1)];
           $code .= $num;
           $_SESSION['scaptcha'] =$code;
            //use a proper font file like verdana.ttf and change the font name at bellow
            imagefttext($image, rand(14, 18), rand(-10,40), $i*25, rand(24,34), $color, _DIR_."/fonts/Verdana.ttf", $num);
        }
        // VERY IMPORTANT: Prevent any Browser Cache!!
        header("Cache-Control: no-cache, must-revalidate");
        
        // // The PHP-file will be rendered as image
        header('Content-type: image/png');
        imagejpeg($image);


    }
}    

captcha::create();
?>