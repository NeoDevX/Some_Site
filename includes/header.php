<div class="header">
	<div class="header__top">
		<div class="container">
			<div class="header__top-logo">
				<h1><?php echo $config['title']; ?></h1>
			</div>
			<div class="header__top-menu">
				<nav>
					<ul>
						<li><a href="/">Main</a></li>
						<li><a href="../pages/About.php">About Me</a></li>
						<li><a href="<?php echo $config['vk_url']; ?>" target="_blank">Me in Vkontakte</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<?php
		$categories_query = mysqli_query($connection, "SELECT * FROM `article_categories`");
		$categories = array();
		while ($categorie = mysqli_fetch_assoc($categories_query))
		{
			$categories[] = $categorie;
		}
	?>

	<div class="header__bottom">
		<div class="container">
			<nav>
				<ul>
					<?php
						foreach ($categories as $categorie)
						{
							?>
							<li>
								<a href="#">
									<?php echo $categorie['title']; ?>
								</a>
							</li>
							<?php
						}
					?>
        </ul>
			</nav>
		</div>
	</div>
</div>

