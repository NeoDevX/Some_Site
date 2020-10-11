<?php include_once 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['title']; ?></title>
	<link rel="stylesheet" href="./src/bootstrap/bootstrap-grid.min.css">
	<link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">

		<?php include_once 'includes/header.php'; ?>

		<div class="main">
			<div class="content">
				<div class="container">
					<div class="row">
						<section class="content__left col-md-8">

							<?php

								$articles = mysqli_query($connection, 'SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 8');

							?>

							<div class="block">
								<a href="#">All entries</a>
								<h3>New articles</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">
										<?php

											while ($article = mysqli_fetch_assoc($articles))
											{ ?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image'] ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php
																echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...';
															?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

							<div class="block">
								<a href="#">All entries</a>
								<h3>Sport</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">

										<?php
											$articles = mysqli_query($connection,
											 	'SELECT * FROM `articleS` WHERE `categorie_id` = 1 ORDER BY `id` DESC LIMIT 4');

											while ($article = mysqli_fetch_assoc($articles))
											{
												?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image']; ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...'; ?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

							<div class="block">
								<a href="#">All entries</a>
								<h3>Hacking</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">

										<?php
											$articles = mysqli_query($connection,
											 	'SELECT * FROM `articleS` WHERE `categorie_id` = 2 ORDER BY `id` DESC LIMIT 4');

											while ($article = mysqli_fetch_assoc($articles))
											{
												?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image']; ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...'; ?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

							<div class="block">
								<a href="#">All entries</a>
								<h3>Programming</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">

										<?php
											$articles = mysqli_query($connection,
											 	'SELECT * FROM `articleS` WHERE `categorie_id` = 3 ORDER BY `id` DESC LIMIT 4');

											while ($article = mysqli_fetch_assoc($articles))
											{
												?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image']; ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...'; ?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

							<div class="block">
								<a href="#">All entries</a>
								<h3>Security</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">

										<?php
											$articles = mysqli_query($connection,
											 	'SELECT * FROM `articleS` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT 4');

											while ($article = mysqli_fetch_assoc($articles))
											{
												?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image']; ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...'; ?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

							<div class="block">
								<a href="#">All entries</a>
								<h3>Other</h3>
								<div class="block__content">
									<div class="articles articles__horizontal">

										<?php
											$articles = mysqli_query($connection,
											 	'SELECT * FROM `articleS` WHERE `categorie_id` = 5 ORDER BY `id` DESC LIMIT 4');

											while ($article = mysqli_fetch_assoc($articles))
											{
												?>
												<div class="article">
													<div class="article__image" style="background-image: url(./src/images/<?php echo $article['image']; ?>);">
													</div>
													<div class="article__info">
														<a href="#" class="article__title"><?php echo mb_substr($article['title'], 0, 25, 'utf-8') . ' ...'; ?></a>
														<div class="article__info-meta">
															<?php
																foreach ($categories as $categorie) {
                                  if ($categorie['id'] == $article['categorie_id']) {
                                    $article_categorie = $categorie;
                                    break;
                                  }
                                }
															?>
															<small>Категория : <a><?php echo $article_categorie['title']; ?></a></small>
														</div>
														<div class="article__info-preview">
															<?php echo mb_substr($article['text'], 0, 80, 'utf-8') . ' ...'; ?>
														</div>
													</div>
												</div>
												<?php
											}
										?>

									</div>
								</div>
							</div>

						</section>

						<section class="content__right col-md-4">

							<?php include_once 'includes/sidebar.php'; ?>

						</section>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>
	<script src="src/js/main.js"></script>

</body>
</html>