<?php
declare(strict_types = 1);
include '../vendor/autoload.php';
include 'User.php';
include 'Admin.php';
include 'Moderator.php';
$user = new User("test@test.com", "1234");
$adm = new Admin("adm@test.com", "123456", 0601010101);
$moderator = new Moderator("mod@test.com", "12345678", "pseudo");

dd($user, $adm, $moderator);