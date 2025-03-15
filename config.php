<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
$allowed_langs = ['en', 'ar'];
if (!in_array($_SESSION['lang'], $allowed_langs)) {
    $_SESSION['lang'] = 'en';
}
$lang_file = 'lang/' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    $lang_data = include($lang_file);
} else {
    $lang_data = include('lang/en.php');
}
?>