<?php
require_once '../helper.php';
require_once 'sum_price.php';
require_once 'change_price.php';
function bad_query(){echo "Список меню - неуспех";}
function success(){echo "Список меню - успех";}

//GET - запрос отвечает за
// суммиррование всех цен из таблицы меню
if (array_key_exists('action', $_GET)
    && $_GET['action'] === 'sum')
    sum_all_prices();
//POST - запрос изменяет все цены на записи в таблицы меню
else if (array_key_exists('action', $_POST)
    && $_POST['action'] === 'sale')
    change_prices();
else bad_query();