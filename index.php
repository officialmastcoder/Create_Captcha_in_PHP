<?php 
if(isset($_POST['captcha'])){
    $postcap = $_POST['captcha'];
    if($_SESSION['scaptcha'] != $postcap){
        echo "Captcha Invalid";
    }else{
        echo "Captcha valid Success";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
    <label for="">Email</label>
    <input type="text">
    <label for="">Captcha</label>
   <input type="text" placeholder="Captcha Code" name="captcha">
    <img src="captcha.php" alt="">
    </form>
</body>
</html>