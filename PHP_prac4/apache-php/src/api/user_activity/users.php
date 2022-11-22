<?php require_once '../helper.php';
require_once 'user_read.php';
require_once 'user_create.php';
require_once 'user_update.php';
require_once 'user_delete.php';
require_once 'user_class.php';
const columns = ['ID', 'name', 'password'];
function bad_query()
{
    echo "Ошибка изменения списка пользователей";
}

function success()
{
    echo "Изменение списка пользователей прошло успешно";
}
//Если пришел GET запрос, то выводим метод чтения одного пользователя
if (array_key_exists('action', $_GET) && $_GET['action'] === 'read') read();
//Для POST запроса выбираем метод согласно параметру
else if (array_key_exists('action', $_POST))
    switch ($_POST['action']) {
        case 'create':
            create();
            break;
        case 'update':
            update();
            break;
        case 'delete':
            delete();
            break;
        default:
            bad_query();
            break;
    } else bad_query();


