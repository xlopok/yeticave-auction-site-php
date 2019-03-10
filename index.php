<?php
// Подключение файла с функциями
require_once('functions.php');
session_start();

// БД
require_once('mysql_connect.php'); // Подключение к бд 

mysqli_set_charset($link, "utf8"); // установка кодировки к бд

// Функции для показа лотов и категорий

// Вызов функция для показа лотов 
$lots_rows = get_lots($link);

// Вызов функция для показа категорий 
$categories_rows = get_catagories($link);

$user_name = $_SESSION['user']['user_name'] ?? "";
$is_auth = $_SESSION['user']?? "";
$page_content = include_template('index.php', ['lots_rows' => $lots_rows, 'categories_rows' => $categories_rows]);
$layout_content = include_template('layout.php', ['content' =>$page_content, 'title' => 'Главная YetiCave', 'user_name' => $user_name, 'is_auth' => $is_auth, 'categories_rows' => $categories_rows]);

print($layout_content);