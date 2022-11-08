<?php require_once '../helper.php';
require_once 'user_class.php';
require_once 'users.php';
function create()
{
    $tmp_user = new user_class(null, null, null);//создание пустого пользователя
    if (array_key_exists(columns[1], $_POST)) { //вводи имени
        $tmp_user->setName($_POST[columns[1]]);

    }
    if (array_key_exists(columns[2], $_POST)) { //ввод пароля
        $tmp_user->setPassword($_POST[columns[2]]);
    }

    if ($tmp_user->getName() == null || $tmp_user->getPassword() == null) {
        bad_query();
        return;
    }

    $mysqli = openMysqli();
    $statement = $mysqli->prepare('insert into users(name, password) values(?, ?)');
    $_password = $tmp_user->getPassword();
    $_name = $tmp_user->getName();

    $statement->bind_param('ss', $_name, $_password);
    $statement->execute() ? success() : bad_query();
    $mysqli->close();
}
