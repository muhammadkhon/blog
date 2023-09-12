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
					<li><a href="/category.php">Категории</a></li>
					<li>Редактировать категорию</li>
				</ul>
				<h1>Редактировать категорию</h1>
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
			<?php if (isset($_GET['id'])) : ?>

				<?php

				if (!empty($_GET['id'])) {


					try {
						$query = "SELECT * FROM category WHERE id = :id";

						$sql = $db->prepare($query);

						$sql->bindValue(':id', $_GET['id']);

						$sql->execute();

						if ($sql->rowCount() > 0) {
							$row = $sql->fetch(); ?>
							<div class="col-md-5 col-md-offset-1">
								<div class="section-row">
									<h3>Редактировать категорию</h3>
									<form action="update_category.php" method="post" name="updateCategory">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<span>Название</span>
													<input class="input" type="text" name="name" value="<?= $row['name']; ?>">
													<input class="input" type="hidden" name="id" value="<?= $row['id']; ?>">
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>Фоновый цвет</span>
													<input class="input" type="color" name="color" value="<?= $row['color']; ?>">
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<span>Статус</span>
													<input class="input" type="checkbox" name="status" <?= $row['status'] == 1 ? 'checked' : ''; ?>>
													<div class="invalid-feedback" style="color: red; display:<?= $_SESSION['error']['status'] ? 'block' : 'none'; ?>">
														<!-- вывод ошибок к полю статус -->
														<?= $_SESSION['error']['status'] ? $_SESSION['error']['status'] : ''; ?>
														<?php unset($_SESSION['error']['status']); ?>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<input type="submit" value="Submit" class="primary-button">
											</div>
										</div>
									</form>
								</div>
							</div>

				<?php
						}
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
				} else {
					echo "Введите правильный параметр";
				}
				?>
			<?php endif; ?>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php //include_once('footer.php'); 
?>