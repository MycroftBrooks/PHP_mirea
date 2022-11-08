<?php require_once '../helper.php';
require_once 'user_class.php';
require_once 'users.php';
function read()
{
    if (array_key_exists('id', $_GET)) $id = $_GET['id'];

    $mysqli = openMysqli();
    $statement = $mysqli->prepare('select * from users where ID = ?');
    $param = intval($id);
    $statement->bind_param('i', $param);

    if (!$statement->execute()) {
        bad_query();
        return;
    } else {
        $res = $statement->get_result()->fetch_assoc();
        $tmp_user = new user_class($res['ID'], $res['name'], $res['password']);
    }
    echo $tmp_user->getId() . " " . $tmp_user->getName() . " " . $tmp_user->getPassword();

    $mysqli->close();
}
