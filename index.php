<?php
require_once("helpers.php");
//require_once("data.php");
require_once("functions.php");
require_once("init.php");
require_once("model.php");

$categories = get_query_category_list($con);

$lots = get_query_list_lots($con, '2022-09-01');

$page_content = include_template("main.php", [
    "categories" => $categories,
    "notification" => $lots
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Титул",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);
