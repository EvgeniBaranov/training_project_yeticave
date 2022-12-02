<?php
require_once("helpers.php");
//require_once("data.php");
require_once("functions.php");
require_once("init.php");
require_once("model.php");

$categories = get_query_category_list($con);


$page_content = include_template("404.php", [
    "categories" => $categories,
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Титул",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);