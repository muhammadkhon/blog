<?php
// подключение необходимых файлов обработчиков
include_once("functions.php");
include_once("session.php");
include_once("db.php");
?>
<?php
if (isset($_POST['id'])) $id = $_POST['id'];
if (isset($_POST['name'])) $name = $_POST['name'];
if (isset($_POST['color'])) $color = $_POST['color'];
if (isset($_POST['status'])) $status = $_POST['status'] == "on" ? 1 : 0;

if (!empty($name) && !empty($status)) {
    try {

        $query = "UPDATE category SET name = :name, color = :color, status = :status WHERE id = :id";

        $sql = $db->prepare($query);

        // $sql->bindValue('id', )

        $data = [
            'id' => $id,
            'name' => $name,
            'color' => $color,
            'status' => $status
        ];

        $sql->execute($data);
        $_SESSION['success'] = 'Категория успешна обновлена.';
        header('Location: category.php');

         } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    if (empty($status)) $_SESSION['error']['status'] = 'Активируйте пожалуйста статус';
    header('Location: update_category_form.php?id=' . $id);
}
?>