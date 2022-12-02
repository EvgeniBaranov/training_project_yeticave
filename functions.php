<?php

date_default_timezone_set('Asia/Yekaterinburg');

$is_auth = rand(0, 1);

$user_name = "Евгений"; // укажите здесь ваше имя

/** Форматирует цену из товара по формату 1000 = 1 000 
 * @param number not_form_price - изначальная цена
 * @return string - форматированная цена
 */
function reformat_price(int $not_form_price)
{
    $not_form_price = ceil($not_form_price);
    $form_price = number_format($not_form_price, 0, "", " ") . " ";
    return "$form_price ₽";
};

/**
 * Вычисляет оставшееся время до закрытия лота в часах и минутах от настоящего времени
 * @param string $lot_time Дата, указанная пользователем, окончания лота
 * @retern array
 */
function get_time_left($lot_time) {
    $today = date_create("now");
    $lot_time = date_create($lot_time);
    $diff = date_diff($lot_time, $today);
    $format_diff = date_interval_format($diff, "%d %H %I");
    $arr = explode(" ", $format_diff);

    $hours = $arr[0] * 24 + $arr[1];
    $minutes = intval($arr[2]);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $res[] = $hours;
    $res[] = $minutes;

    return $res;
}; 

/**
 * Валидиреут полученные категории в соответствии с БД, 
 * если такой категории нет, возвращает сообщение об ошибке
 * @param int $id категория от пользователя
 * @param array $allowed_list категории из БД
 * @return string
 */
function validate_category($id, $allowed_list) {
    if (!in_array($id, $allowed_list)) {
        return "Указана несуществующая категория";
    }

    return null;
}

/**
 * Валидирует текстовые сообщения по длине от min до max, 
 * если длина не соответствует - сообщение об ошибке
 * @param int $min
 * @param int $max
 * @param string $value сообщение от пользователя
 * @return string
 */
function validate_length($value, $min, $max) {
    if ($value) {
        $len = strlen($value);
        if ($len < $min or $len > $max) {
            return "Значение должно быть от $min до $max символов";
        }
    }

    return null;
}

/**
 * Возвращает целое значение введенной переменной value (intval) и переменная больше 0,
 * если оба условия верны - возвращает NULL, если одно из или оба не верны - сообщение об ошибке
 * @param string $value
 * @return string
 */
function validate_num($value) {
    if (is_int($value) && $value > 0) {
        return NULL;
    } else {
        return 'Содержимое поля должно быть целым числом больше ноля';
    }
}

function validate_date($value){
    if (is_date_valid($value)) {
        $now = date_create("now");
        $lot_date = date_create($value);
        $diff = date_diff($lot_date, $now);
        $format_diff = date_interval_format($diff, "%d");
        if ($format_diff < 1) {
            return 'Дата должна быть больше текущей не менее чем на один день';
        }
    } else {
        return "Содержимое поля «дата завершения» должно быть датой в формате «ГГГГ-ММ-ДД»";
    }
}
?>