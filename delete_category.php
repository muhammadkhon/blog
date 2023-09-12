<?php
// подключение необходимых файлов обработчиков
include_once("functions.php");
include_once("session.php");
include_once("db.php");

if (isset($_GET['id'])) $id = $_GET['id'];

if (!empty($id)) {
    try {

        $query = "DELETE FROM category WHERE id = :id";

        $sql = $db->prepare($query);


        $data = [
            'id' => $id
        ];

        $sql->execute($data);
        $_SESSION['success'] = 'Категория успешна удалена.';
        header('Location: category.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    if (empty($status)) $_SESSION['error']['text'] = 'Введите правильный идентификатор для удаления';
    header('Location: category.php');
}
?>