<?php
	include_once("db.php");
	include_once("functions.php");
?>
<!-- metanit.com/php/mysql/2.1.php -->

<?php include_once('header.php') ?>

			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li>Contact</li>
							</ul>
							<h1>Contact</h1>
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
				<?php if(!isset($_POST['name']) && !isset($_POST['status'])) : ?>
                <div class="col-md-5 col-md-offset-1">
						<div class="section-row">
							<h3>Добавить категорию</h3>
							<form action="add_category.php" method="post">
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<span>Название</span>
											<input class="input" type="text" name="name">
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Фоновый цвет</span>
											<input class="input" type="color" name="color">
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<span>Статус</span>
											<input class="input" type="checkbox" name="status">
										</div>
									</div>
									<div class="col-md-12">
										<input type="submit" value="Submit" class="primary-button">
									</div>
								</div>
							</form>
						</div>
					</div>
				<?php else: ?>

					<?php
						if(isset($_POST['name'])) $name = $_POST['name'];
						if(isset($_POST['color'])) $color = $_POST['color'];
						if(isset($_POST['status'])) $status = $_POST['status'] == "on" ? 1 : 0;

						
						if(!empty($name) && !empty($status)) {
							try {

								$query = "INSERT INTO category(name, color, status) VALUES(:name, :color, :status)";

								$sql = $db->prepare($query);
								
								$data = [
									'name' => $name,
									'color' => $color,
									'status' => $status
								];
								
								$sql->execute($data);

								echo "Ok";
								echo "<br>";

								$sql = "SELECT * FROM category";
								$result = $db->query($sql);

								debug($result);


								while($row = $result->fetch()) {
									debug($row);
								}

								debug($row);


							} catch(PDOException $e) {
								echo $e->getMessage();
							} 
						} else {
							echo "Запольните форму правильно.";
						}

						

					?>

				<?php endif; ?>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<?php //include_once('footer.php'); ?>
