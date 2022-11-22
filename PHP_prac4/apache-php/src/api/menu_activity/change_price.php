<?php
require_once 'main_menu.php';
require_once '../helper.php';
function change_prices()
{
    if (array_key_exists('multiplier', $_POST)
        && array_key_exists('mode', $_POST))
    {
        $multiplier = $_POST['multiplier'];
        $mode = $_POST['mode'];
    }

    if (!isset($multiplier)
        || !is_numeric($multiplier)
        || !isset($mode)
        || !is_numeric($mode))
    {
        bad_query();
        return;
    }
    //mode - отвечает за операцию с ценами, 0 - умножить цену на коэффициент, иначе разделить
    $tmp_mode = intval($mode) == 0 ? '*' : '/';
    $mysqli = openMysqli();
    $statement = $mysqli->prepare(sprintf('update menu set price = price %s ?', $tmp_mode));//создание запроса
    $statement->bind_param('i', $multiplier);//привязка параметра типa int
    $statement->execute() ? success() : bad_query();//проверка отправки запроса
    $mysqli->close();
}