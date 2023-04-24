<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thermal baths and SPA</title>
</head>
<body>
    <header class="header-main">
        <div class='header-container'>
            <span>Thermal baths and SPA</span>
        </div>
    </header>
    <div class="container-main">
        <?php
        include 'init.php';
        if(!$auth){
            
            ?>
            <div class="forma-box">
                <form action="autor.php" method = "post">
                    Username: <input type="text" name="username" placeholder="Username" value=""/>
                    <br/>
                    Password: <input type="password" name="password" placeholder="Password" value=""/>
                    <br/>
                    <br/>
                    <input type="submit" name="submit" value="Submit"/>
                </form>
                <span> <?php if(isset($_SESSION['ini']) && !$auth) { echo $_SESSION['ini'];}?> </span>
                <div class="news">
                    <p style="font-size: 20px; text-align: center;">News</p>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna 
                        aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea 
                        takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
            </div>
            <div class="img-box">
                <div class="about">
                    <p style="font-size: 24px; text-align: center;">ABOUT</p>
                    <p style="text-align:left">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing 
                    elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et 
                    justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        <?php } 

if ($auth) {
    if (isset($_COOKIE['visitAdmin']) && $_SESSION['login'] == 'admin' ) {
        $_SESSION['visit'] = $_COOKIE['visitAdmin'];  

    } else if (isset($_COOKIE['visitUser']) && $_SESSION['login'] == 'user' ) {
        $_SESSION['visit'] = $_COOKIE['visitUser'];  

    } else if (isset($_COOKIE['visitIvan']) && $_SESSION['login'] == 'ivan' ) {
        $_SESSION['visit'] = $_COOKIE['visitIvan'];  
        
    } else if (isset($_COOKIE['visitWaldy']) && $_SESSION['login'] == 'waldy' ) {
        $_SESSION['visit'] = $_COOKIE['visitWaldy'];  
    }

    

    if (isset($_COOKIE['offerAdmin']) && $_SESSION['login'] == 'admin' ) {
        $offer = $_COOKIE['offerAdmin'];  

    } else if (isset($_COOKIE['offerUser']) && $_SESSION['login'] == 'user' ) {
        $offer = $_COOKIE['offerUser'];  

    } else if (isset($_COOKIE['offerIvan']) && $_SESSION['login'] == 'ivan' ) {
        $offer = $_COOKIE['offerIvan'];  
        
    } else if (isset($_COOKIE['offerWaldy']) && $_SESSION['login'] == 'waldy' ) {
        $offer = $_COOKIE['offerWaldy'];  
    }


    $datetime3 = new DateTime(date("H:i:s"));
    $datetime4 = new DateTime('23:59:59');
    $interval2 = $datetime3->diff($datetime4);

    ?>
        <div class="forma-box"> 
            <p style="font-size: 20px; text-align: center;">Logged in as <?= $_SESSION['login']?></p>
            <br>
            <a href="autor.php">Personal Area <?= $_SESSION['login']?></a>
            <br>
            <div class="promotion">
                <p>You entered the Site at:<br><span ><?php echo $_SESSION['visit'];?></span></p>
                <p>Promotion Time<br><span style="font-size: 18px; text-align: center;"><?php echo $offer ?></span></p>
                <p><a href="#" alt='<?php include 'usersList.php'; echo $img[$offer]?>'><img src="<?php include 'usersList.php'; echo $img[$offer]?>" width="150" height="80"></a><br><?php echo $interval2->format(' %h h. %i min. %s sek.'); ?></p>
            </div>
        <div>
            <?php
                include 'usersList.php';
                $date = date('d.m');
                if (sha1($date) == $usersList[$_SESSION['login']]['bday2']) { ?>
                    <p>Your birthday offer<br> 50% discount for<br><span style="font-size: 18px; text-align: center;"><?php echo $_COOKIE['offerPromotion'] ?></span></p>
                    <p><a href="#" alt='<?php echo $_COOKIE['offerPromotion'] ?>'><img src="<?php include 'usersList.php'; echo $img[$_COOKIE['offerPromotion']]?>" width="150" height="80"></a><br><?php echo $interval2->format(' %h h. %i min. %s sek.'); ?></p>
             <?php } ?>
            </div>
            <form action="index.php" method = "post">
                <input name="logout" type="submit" value="Logout">
            </form>
        </div>
        <div class="img-box">
            <span style='font-size: 26px;' >MENU</span>
            <br>
            <a href="img/thermalbad.jpg" style= 'text-decoration: none;' >Thermal baths<img src="img/thermalbad.jpg" width="150" height="65"></a>
            <br>
            <br>
            <a href="img/spa.jpg" style= 'text-decoration: none;' >SPA<br> <img src="img/spa.jpg" width="150" height="65"></a>
            <br>
            <br>
            <a href="img/Sauna-Blog 2.jpg" style= 'text-decoration: none;' >Sauna <img src="img/Sauna-Blog 2.jpg" width="150" height="65"></a>
            <br>
            <br>
            <a href="#" style= 'text-decoration: none;' >Price <img src="img/thermalbad.jpg" width="150" height="65" ></a>
            <br>
            <br>
            <a href="img/oeffnungszeiten-1024x631.jpg" style= 'text-decoration: none;' >Opening hours<img src="img/oeffnungszeiten-1024x631.jpg" width="150" ></a>
        </div>
    
    <?php }

?>
</body>
</html>
