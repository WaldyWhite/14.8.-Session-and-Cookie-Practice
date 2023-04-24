<?php
include 'usersList.php';
session_start();
session_destroy ();



if (isset($_POST['username'])) {
    $userLogin = $_POST['username'];
} else {
    $userLogin = $_SESSION['login'];
}

if (isset($_POST['password'])) {
    $userPassword = sha1($_POST['password']);
} else {
    $userPassword = $_SESSION['password'];
}

if (isset($_POST['birthday'])) {
    $userBirthday = $_POST['birthday'];
} else {
    $userBirthday = '0';
}

if (sha1($userBirthday) == $usersList[$userLogin]['bday']) {
    $birdDay = true;
} else {
    $birdDay = false;
}

if(isset($_POST['birthday']) && !$birdDay) {
    session_start();
    $_SESSION['bday'] = 'Please enter your birthday correctly';
}

/* die Funktion getUsersList() gibt ein Array aller Benutzer und ihrer Passwort-Hashes zurück (функция getUsersList() возвращает массив всех пользователей и хэшей их паролей). */
function getUsersList ($array) {
    return $array;
};
// var_dump(getUsersList($usersList));

/* Die FunktionexistsUser($login) prüft, ob ein Benutzer mit dem angegebenen Login existiert (функция existsUser($login) проверяет, существует ли пользователь с указанным логином). */
function existsUser ($login, $arrayFunction) {
    return (array_key_exists($login, $arrayFunction));
}
// var_dump(existsUser ($userLogin, getUsersList($usersList))); 

/* Lassen Sie die Funktion checkPassword($login, $password) true zurückgeben, wenn ein Benutzer mit dem angegebenen Login und dem von ihm eingegebenen Passwort die Prüfung bestanden hat, andernfalls — false
(функция checkPassword($login, $password) возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false;); */
function checkPassword ($login, $password, $array) {
 if (existsUser ($login, $array) && $password === $array[$login]['password']) {
    return true;
 };
};
// var_dump(checkPassword ($userLogin, $userPassword, getUsersList($usersList)));

/* getCurrentUser()-Funktion, die entweder den Namen des Benutzers zurückgibt, der sich bei der Site angemeldet hat, oder null (функция getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null.). */
function getCurrentUser ($login, $password, $array) {
if (checkPassword ($login, $password, $array)) {
    return $login;
    } else {
        return null;
        };
}

function imgRand ($keyList, $imgList) {
    $i = rand(0, 2);
    $imgRadom = $imgList[$keyList[$i]];
    return $imgRadom;
}


