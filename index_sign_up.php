<?php
require_once("helpers.php");
//require_once("data.php");
require_once("functions.php");
require_once("init.php");
require_once("model.php");

$categories = get_query_category_list($con);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $required = ["email", "password", "name", "message"];
    $errors = [];

    $rules = [
        "email" => function ($value) {
            return validate_email($value);
        },
        "password" => function ($value) {
            return validate_length($value, 6, 12);
        },
        "name" => function ($value) {
            return validate_length($value, 5, 15);
        },
        "message" => function ($value) {
            return validate_length($value, 10, 250);
        }
    ];

    $user = filter_input_array(
        INPUT_POST,
        [
            "email" => FILTER_DEFAULT,
            "password" => FILTER_DEFAULT,
            "name" => FILTER_DEFAULT,
            "message" => FILTER_DEFAULT
        ],
        true
    );

    foreach ($user as $field => $value) {
        if (isset($rules[$field])) {
            $rule = $rules[$field];
            $errors[$field] = $rule($value);
        }
        if (in_array($field, $required) && empty($value)) {
            $errors[$field] = "Поле $field нужно заполнить";
        }
    }
    if (count($errors)) {
        $page_content = include_template("sign_up.php", [
            "categories" => $categories,
            "errors" => $errors,
            "user" => $user
        ]);
    }
} else {
    $page_content = include_template("sign_up.php", [
        "categories" => $categories,
        "user" => null
    ]);
}

$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Титул",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);
