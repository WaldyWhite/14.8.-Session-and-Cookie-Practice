<?php
include 'process.php';
/* если (isset(мой_массив["мой_ключ"])){
    моё_действиее с мой_массив["мой_ключ"];
}
$userPassword = sha1($_POST['password']);
*/
// Wenn das Passwort aus der Datenbank mit dem Passwort aus dem Formular übereinstimmt (Если пароль из базы совпадает с паролем из формы)
if (getCurrentUser ($userLogin, $userPassword, getUsersList($usersList))) {

    $user = getCurrentUser ($userLogin, $userPassword, getUsersList($usersList));

    // We start the session(Стартуем сессию:)
    session_start();

   	// We write to the session information that we are authorized(Пишем в сессию информацию о том, что мы авторизовались:)
    $_SESSION['auth'] = true; 
        
    // Пишем в сессию логин и id пользователя
    $_SESSION['id'] = getUsersList ($usersList)[$user]['id']; 
    $_SESSION['login'] = $user;
    $_SESSION['password'] = $userPassword;
    $_SESSION['ini'] = null;
    setcookie('offer',array_search(imgRand($keyRandom, $img),$img ));
    } else {
    session_start();
    $new_url = 'http://localhost/';
    header('Location: '.$new_url);
    $_SESSION['ini'] = 'Check your username and password';
    exit();
    }
    $auth = $_SESSION['auth'] ?? null;

// если авторизованы
if ($auth && $_SESSION['login'] == 'admin') {
    if (!isset($_COOKIE['admin'])) {
        $visitTime = date("H:i:s");
        setcookie('visitAdmin', $visitTime, time() + 86400);
        setcookie('offerAdmin', array_search(imgRand($keyRandom, $img),$img ), time() + 86400);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?=$_SESSION['login']?></title>
</head>
<body>
    <header class="header-main">
        <div class='header-container'>
            <span>Thermal baths and SPA</span>
        </div>
    </header>
    <div class="container-main">
    <?php }
    if (isset($_COOKIE[$_SESSION['login']])  && !$birdDay && $_COOKIE[$_SESSION['login']] == '1' ) {
        ?>
        <div class="forma-box">
            <form action="autor.php" method = "post">
            Enter your birthday <?=$_SESSION['login']?>:<input type="text" name="birthday" placeholder="dd.mm.yyyy" value="" autocomplete="off"/>
                <br>
                <br>
                <input type="submit" name="submit" value="Submit" autocomplete="off"/>
            </form>
            <form action="index.php" method = "post">
                <br>
                <input name="logout" type="submit" value="Logout">
            </form>
            <span><?php if(isset($_SESSION['bday']) && !$birdDay) { echo $_SESSION['bday'];}?> </span>
            <img src="img/sauna-room-and-sweat-image_1057072.jpg" width="150" height="270" style= 'margin-top: 143px;'>
        </div>
        <div class="img-box">
            <img src="img/images.jpg" alt='Spa img' width="150" height="270"><br>
            <br>
            <img src="img/istockphoto-601901140-612x612.jpg" alt='Spa img' width="150" height="270">
        </div>
        <?php }
// если авторизованы
        if (!isset($_COOKIE[$_SESSION['login']]) && $_SESSION['login'] == 'admin' || $birdDay && $_SESSION['login'] == 'admin'){
            setcookie($_SESSION['login'], $_SESSION['id']);
        ?>
        <div class="forma-box">
            <p style="font-size: 24px; text-align: center;">Personal Area</p><br>
            <p>Hello <?= $_SESSION['login']?></p><br>
            <p>Your subscriptions</p>
            <a href="img/thermalbad.jpg" style= 'text-decoration: none;' >Thermal baths<img src="img/thermalbad.jpg" width="150" height="65"></a><br>
            <br>
            <a href="img/Sauna-Blog 2.jpg" style= 'text-decoration: none;' >Sauna <img src="img/Sauna-Blog 2.jpg" width="150" height="65"></a><br>
            <br>
            <br>
            <a href="index.php" name="logout" type="submit" value="Logout">Back to the main page</a>
            <br>
        </div>
        <div class="img-box" style="text-align: left;">
            <p style="font-size: 24px; text-align: center;">Personal data</p>
            <p>Login: <?=$_SESSION['login']?></p>
            <p>Firstname: ***</p>
            <p>Lastname: ***</p>
            <p>eMail: ***</p>
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:100px">
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:50px">
        </div>
    </div>
</body>
</html>
<?php } else {
    $userBirthday = '0';
}
// если авторизованы
if ($auth && $_SESSION['login'] == 'waldy') {
    if (!isset($_COOKIE['waldy'])) {
        $visitTime = date("H:i:s");
        setcookie('visitWaldy', $visitTime, time() + 86400);
        setcookie('offerWaldy', array_search(imgRand($keyRandom, $img),$img ), time() + 86400);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?=$_SESSION['login']?></title>
</head>
<body>
    <header class="header-main">
        <div class='header-container'>
            <span>Thermal baths and SPA</span>
        </div>
    </header>
    <div class="container-main">
    <?php }
    if (isset($_COOKIE[$_SESSION['login']])  && !$birdDay && $_COOKIE[$_SESSION['login']] == '4' ) {
        ?>
        <div class="forma-box">
            <form action="autor.php" method = "post">
            Enter your birthday <?=$_SESSION['login']?>:<input type="text" name="birthday" placeholder="dd.mm.yyyy" value="" autocomplete="off"/>
                <br>
                <br>
                <input type="submit" name="submit" value="Submit" autocomplete="off"/>
            </form>
            <form action="index.php" method = "post">
                <br>
                <input name="logout" type="submit" value="Logout">
            </form>
            <span><?php if(isset($_SESSION['bday']) && !$birdDay) { echo $_SESSION['bday'];}?> </span>
            <img src="img/sauna-room-and-sweat-image_1057072.jpg" width="150" height="270" style= 'margin-top: 143px;'>
        </div>
        <div class="img-box">
            <img src="img/images.jpg" alt='Spa img' width="150" height="270"><br>
            <br>
            <img src="img/istockphoto-601901140-612x612.jpg" alt='Spa img' width="150" height="270">
        </div>
    </div>
        <?php }
// если авторизованы
        if (!isset($_COOKIE[$_SESSION['login']]) && $_SESSION['login'] == 'waldy' || $birdDay && $_SESSION['login'] == 'waldy'){
            setcookie($_SESSION['login'], $_SESSION['id']);
        ?>
        <div class="forma-box">
            <p style="font-size: 24px; text-align: center;">Personal Area</p><br>
            <p>Hello <?= $_SESSION['login']?></p><br>
            <p>Your subscriptions</p>
            <a href="img/Sauna-Blog 2.jpg" style= 'text-decoration: none;' >Sauna <img src="img/Sauna-Blog 2.jpg" width="150" height="65"></a><br>
            <br>
            <a href="img/spa.jpg" style= 'text-decoration: none;' >SPA<br> <img src="img/spa.jpg" width="150" height="65"></a><br>
            <br>
            <br>
            <a href="index.php" name="logout" type="submit" value="Logout">Back to the main page</a>
            <br>
        </div>
        <div class="img-box" style="text-align: left;">
            <p style="font-size: 24px; text-align: center;">Personal data</p>
            <p>Login: <?=$_SESSION['login']?></p>
            <p>Firstname: ***</p>
            <p>Lastname: ***</p>
            <p>eMail: ***</p>
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:100px">
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:50px">
        </div>
</body>
</html>
<?php }

// если авторизованы
if ($auth && $_SESSION['login'] == 'ivan') {
    if (!isset($_COOKIE['ivan'])) {
        $visitTime = date("H:i:s");
        setcookie('visitIvan', $visitTime, time() + 86400);
        setcookie('offerIvan', array_search(imgRand($keyRandom, $img),$img ), time() + 86400);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?=$_SESSION['login']?></title>
</head>
<body>
    <header class="header-main">
        <div class='header-container'>
            <span>Thermal baths and SPA</span>
        </div>
    </header>
    <div class="container-main">
    <?php }
    if (isset($_COOKIE[$_SESSION['login']])  && !$birdDay && $_COOKIE[$_SESSION['login']] == '3'  ) {
        ?>
        <div class="forma-box">
            <form action="autor.php" method = "post">
            Enter your birthday <?=$_SESSION['login']?>:<input type="text" name="birthday" placeholder="dd.mm.yyyy" value="" autocomplete="off"/>
                <br>
                <br>
                <input type="submit" name="submit" value="Submit" autocomplete="off"/>
            </form>
            <form action="index.php" method = "post">
                <br>
                <input name="logout" type="submit" value="Logout">
            </form>
            <span><?php if(isset($_SESSION['bday']) && !$birdDay) { echo $_SESSION['bday'];}?> </span>
            <img src="img/sauna-room-and-sweat-image_1057072.jpg" width="150" height="270" style= 'margin-top: 143px;'>
        </div>
        <div class="img-box">
            <img src="img/images.jpg" alt='Spa img' width="150" height="270"><br>
            <br>
            <img src="img/istockphoto-601901140-612x612.jpg" alt='Spa img' width="150" height="270">
        </div>
        <?php }
// если авторизованы
        if (!isset($_COOKIE[$_SESSION['login']]) && $_SESSION['login'] == 'ivan' || $birdDay && $_SESSION['login'] == 'ivan' ){
            setcookie($_SESSION['login'], $_SESSION['id']);
        ?>
        <div class="forma-box">
            <p style="font-size: 24px; text-align: center;">Personal Area</p><br>
            <p>Hello <?= $_SESSION['login']?></p><br>
            <p>Your subscriptions</p>
            <a href="img/Sauna-Blog 2.jpg" style= 'text-decoration: none;' >Sauna <img src="img/Sauna-Blog 2.jpg" width="150" height="65"></a><br>
            <br>
            <a href="img/spa.jpg" style= 'text-decoration: none;' >SPA<br> <img src="img/spa.jpg" width="150" height="65"></a><br>
            <br>
            <a href="img/thermalbad.jpg" style= 'text-decoration: none;' >Thermal baths<img src="img/thermalbad.jpg" width="150" height="65"></a><br>
            <br>
            <a href="index.php" name="logout" type="submit" value="Logout">Back to the main page</a>
            <br>
        </div>
        <div class="img-box" style="text-align: left;">
            <p style="font-size: 24px; text-align: center;">Personal data</p>
            <p>Login: <?=$_SESSION['login']?></p>
            <p>Firstname: ***</p>
            <p>Lastname: ***</p>
            <p>eMail: ***</p>
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:100px">
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:50px">
        </div>
    </div>
</body>
</html>
<?php }


// если авторизованы
if ($auth && $_SESSION['login'] == 'user') {
    if (!isset($_COOKIE['auser'])) {
        $visitTime = date("H:i:s");
        setcookie('visitUser', $visitTime, time() + 86400);
        setcookie('offerUser', array_search(imgRand($keyRandom, $img),$img ), time() + 86400);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?=$_SESSION['login']?></title>
</head>
<body>
    <header class="header-main">
        <div class='header-container'>
            <span>Thermal baths and SPA</span>
        </div>
    </header>
    <div class="container-main">
    <?php }
    if (isset($_COOKIE[$_SESSION['login']])  && !$birdDay && $_COOKIE[$_SESSION['login']] == '2' ) {
        ?>
        <div class="forma-box">
            <form action="autor.php" method = "post">
            Enter your birthday <?=$_SESSION['login']?>:<input type="text" name="birthday" placeholder="dd.mm.yyyy" value="" autocomplete="off"/>
                <br>
                <br>
                <input type="submit" name="submit" value="Submit" autocomplete="off"/>
            </form>
            <form action="index.php" method = "post">
                <br>
                <input name="logout" type="submit" value="Logout">
            </form>
            <span><?php if(isset($_SESSION['bday']) && !$birdDay) { echo $_SESSION['bday'];}?> </span><br>
            <br>
            <img src="img/sauna-room-and-sweat-image_1057072.jpg" width="150" height="270" style= 'margin-top: 143px;'>
        </div>
        <div class="img-box">
            <img src="img/images.jpg" alt='Spa img' width="150" height="270"><br>
            <br>
            <img src="img/istockphoto-601901140-612x612.jpg" alt='Spa img' width="150" height="270">
        </div>
        <?php }
// если авторизованы
        if (!isset($_COOKIE[$_SESSION['login']]) && $_SESSION['login'] == 'user' || $birdDay && $_SESSION['login'] == 'user' ){
            setcookie($_SESSION['login'], $_SESSION['id']);
        ?>
        <div class="forma-box">
            <p style="font-size: 24px; text-align: center;">Personal Area</p><br>
            <p>Hello <?= $_SESSION['login']?></p><br>
            <p>Your subscriptions</p>
            <a href="img/thermalbad.jpg" style= 'text-decoration: none;' >Thermal baths<img src="img/thermalbad.jpg" width="150" height="65"></a><br>
            <br>
            <a href="img/spa.jpg" style= 'text-decoration: none;' >SPA<br> <img src="img/spa.jpg" width="150" height="65"></a><br>
            <br>
            <br>
            <a href="index.php" name="logout" type="submit" value="Logout">Back to the main page</a>
            <br>
        </div>
        <div class="img-box" style="text-align: left;">
            <p style="font-size: 24px; text-align: center;">Personal data</p>
            <p>Login: <?=$_SESSION['login']?></p>
            <p>Firstname: ***</p>
            <p>Lastname: ***</p>
            <p>eMail: ***</p>
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:100px">
            <img src="<?php echo imgRand($keyRandom, $img);?>" width="150" height="80" style="margin-left:15px; margin-top:50px">
        </div>
    </div>
</body>
</html>
<?php }
?>