<?php
// подключение необходимых файлов обработчиков
include_once("functions.php");
include_once("session.php");
include_once("db.php");
include_once('header.php');
?>

<!-- Page Header -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="/">Home</a></li>
					<li>Категории</li>
				</ul>
				<h1>Категории</h1>
			</div>
		</div>
	</div>
</div>
<!-- /Page Header -->
</header>
<!-- /Header -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-row">
					<h3>Категории</h3>

					<a href="add_category.php">Добавить категорию</a>

					<?= isset($_SESSION['success']) ? "<h4 style='color: green;'>" . $_SESSION['success'] . "</h4>" : "" ?>
					<?= isset($_SESSION['error']['text']) ? "<h4 style='color: red;'>" . $_SESSION['error']['text'] . "</h4>" : "" ?>
					<?php
					unset($_SESSION['success']);
					unset($_SESSION['error']['text']);
					?>

					<table border="1" width="100%">
						<tr>
							<th width="10%">ID</td>
							<th width="20%">Name</td>
							<th width="20%">Color</td>
							<th width="20%">Status</td>
							<th width="20%">Action</td>
						</tr>
						<?php
						try {
							$sql = "SELECT * FROM category";
							$result = $db->query($sql);

							while ($row = $result->fetch()) {
								echo '<tr>';
								echo '<td>' . $row['id'] . '</td>';
								echo '<td>' . $row['name'] . '</td>';
								echo '<td style="background-color:' . $row['color'] . '; color: white;">' . $row['color'] . '</td>';
								echo '<td>' . ($row['status'] == '1' ? 'on' : 'off') . '</td>';
								echo '<td><a href="/update_category_form.php?id=' . $row['id'] . '">Редактировать</a> | <a href="/delete_category.php?id=' . $row['id'] . '">Удалить</a></td>';
								echo '</tr>';
							}
						} catch (PDOException $e) {
							new Log($e);
							$_SESSION['error']['text'] = 'При выполнение данной операции произошла ошибка';
						} catch (Error $e) {
							new Log($e);
							$_SESSION['error']['text'] = 'При выполнение данной операции произошла ошибка';
						}
						?>
					</table>
				</div>
			</div>




		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php //include_once('footer.php'); 
?>