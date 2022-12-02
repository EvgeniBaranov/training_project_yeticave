<?php

/**
 * Формирует SQL-запрос для получения списка новых лотов от определенной даты, с сортировкой
 * $con соединений с базой MySQL
 * @param string $date Дата в виде строки, в формате 'YYYY-MM-DD'
 * @return string SQL-запрос
 */
function get_query_list_lots($con, $date)
{
    $sql = "SELECT l.id, l.title, l.start_price, l.img, l.completion_date, c.name_category FROM lots l
    JOIN categories c ON l.category_id=c.id
    WHERE l.completion_date > NOW() and l.order_date >= '$date' ORDER BY l.order_date DESC";
    $lots_res = mysqli_query($con, $sql);
    if ($lots_res) {
        return mysqli_fetch_all($lots_res, MYSQLI_ASSOC);
    } else {
        return mysqli_error($con);
    }
}

/**
 * Формирует SQL-запрос для получения списка категорий
 * @return array SQL-запрос
 */
function get_query_category_list($con)
{
    $sql = "SELECT id, code, name_category FROM categories";
    $cat_res = mysqli_query($con, $sql);
    if ($cat_res) {
        return mysqli_fetch_all($cat_res, MYSQLI_ASSOC);
    } else {
        return mysqli_error($con);
    }
}

/**
 * Формирует SQL-запрос для показа лота на странице index_lot.php
 * @param integer $id_lot id лота
 * @return string SQL-запрос
 */
function get_query_lot($con, $id_lot)
{
    $num_rows = mysqli_query($con, "SELECT * FROM lots");
    $num_rows = mysqli_num_rows($num_rows);
    if ($id_lot <= $num_rows) {
        $sql = "SELECT l.id, l.title, l.start_price, l.img, l.completion_date, c.name_category, l.about FROM lots l
    JOIN categories c ON l.category_id=c.id
    WHERE l.id='$id_lot'";
        $lot_res = mysqli_query($con, $sql);
        if ($lot_res) {
            return mysqli_fetch_assoc($lot_res);
        } else {
            return mysqli_error($con);
        }
    } else {
        header("Location: ".'index_404.php');
        die();
    }
}
