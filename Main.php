<?php

namespace lab1;

use Comment;
use DateTime;
use User;


require_once 'vendor/autoload.php';
require_once 'User.php';
require_once 'Comment.php';

//задание на дату регистрации
$user1 = new User(1, "Dima", "aaaaa@mail.ru", "324442", new Datetime("2014-11-22"));
$user2 = new User(2, "Ira", "bbbbb@mail.ru", "324234", new Datetime("2018-9-10"));
$user3 = new User(3, "Misha", "ccccc@mail.ru", "evemvem", new Datetime("2013-04-26"));
$user4 = new User(4, "Sasha", "ddddd@mail.ru", "veenvo", new Datetime("2017-09-12"));
$user5 = new User(5, "Vlad", "eeeee@mail.ru", "23kjn432n4k", new Datetime("2024-01-02"));

$com1 = new Comment($user1, "Hello");
$com2 = new Comment($user2, "Hey");
$com3 = new Comment($user3, "My comment");
$com4 = new Comment($user4, "New day");
$com5 = new Comment($user5, "Wow");
echo "<br>";
$comArray = array($com1, $com2, $com3, $com4, $com5);
for ($i = 0; $i < count($comArray); $i++) {
    if ($comArray[$i]->returnAfterDate(new DateTime("2018-05-15"))) {
        echo $comArray[$i]->user->name . " posted comment " . $comArray[$i]->textComment . "<br>";
    }
}

echo "<br>";
echo "<br>";
echo "<br>";
// wrong name
$user01 = new User(1, "", "aaa@mail.ru", "12dsadas345", new Datetime("2012-11-15"));
echo "<br>";
// wrong email
$user02 = new User(4, "Ira", "cacmail.ru", "gfdge2133", new Datetime("2015-09-05"));
echo "<br>";
//wrong id
$user03 = new User(-32, "Sasha", "bbbb@mail.ru", "123sdae1245", new Datetime("2024-01-02"));
echo "<br>";
//wrong password
$user04 = new User(3, "Misha", "efnvjke@mail.ru", "", new Datetime("2017-03-27"));
echo "<br>";