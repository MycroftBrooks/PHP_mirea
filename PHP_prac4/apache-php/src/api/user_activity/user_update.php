<?php require_once '../helper.php';
require_once 'user_class.php';
require_once 'users.php';
function update()
{
    if (array_key_exists('id', $_POST)) $id = $_POST['id'];
    if (!isset($id)) {
        bad_query();
        return;
    }
    //для каждого набора параметров, подготавливаем свой sql запрос
    $tmp_user = new user_class(null, null, null);
    if (array_key_exists(columns[2], $_POST)) $tmp_user->setPassword($_POST[columns[2]]);
    if (array_key_exists(columns[1], $_POST)) {
        $tmp_user->setName($_POST[columns[1]]);
        $tmp_user->getPassword() != null
            ? $tmp_query = 'update users set name = ?, password = ? where ID = ?' //Если меняем имя и пароль
            : $tmp_query = 'update users set name = ? where ID = ?'; //Если меняем только имя
    } elseif (isset($password)) {
        $tmp_query = 'update users set password = ? where ID = ?'; //Меняем только пароль
    } else {
        bad_query();
        return;
    }

    $tmp_user->setId(intval($id));
    $mysqli = openMysqli();
    $statement = $mysqli->prepare($tmp_query);
    $name1 = $tmp_user->getName();
    $password1 = $tmp_user->getPassword();
    $id1 = $tmp_user->getId();

    //Выбор набора параметров для выбранного запроса, в зависимости от переданных параметров
    $tmp_user->getPassword() !== null
        ? $tmp_user->getName() !== null
        ? $statement->bind_param("ssi", $name1, $password1, $id1)
        : $statement->bind_param('si', $password1, $id1)
        : $statement->bind_param('si', $name1, $id1);
    $statement->execute() ? success() : bad_query();
    $mysqli->close();
}
