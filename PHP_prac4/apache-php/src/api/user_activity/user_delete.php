<?php require_once '../helper.php';
require_once 'user_class.php';
require_once 'users.php';
function delete()
{
    if (array_key_exists('id', $_POST)) $id = $_POST['id'];
    if (!isset($id)) {
        bad_query();
        return;
    }
    $mysqli = openMysqli();
    $statement = $mysqli->prepare('delete from users where ID = ?');
    $statement->bind_param('i', $id);
    $statement->execute() ? success() : bad_query();
    $mysqli->close();
}
