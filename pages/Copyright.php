<?php include_once '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['title']; ?></title>
	<link rel="stylesheet" href="../src/bootstrap/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">

		<?php include_once '../includes/header.php'; ?>

		<div class="main">
			<div class="content">
				<div class="container">
					<div class="row">
						<section class="content__left col-md-8"></section>

						<section class="content__right col-md-4">

							<?php include_once '../includes/sidebar.php'; ?>

						</section>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once '../includes/footer.php'; ?>

</body>
</html>