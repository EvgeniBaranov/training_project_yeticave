<?php
require_once("helpers.php");
//require_once("data.php");
require_once("functions.php");
require_once("init.php");
require_once("model.php");

$categories = get_query_category_list($con);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

if ($id){
$lot = get_query_lot($con, $id);
}

$page_content = include_template("lot.php", [
    "lot" => $lot,
]);

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Титул",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);
