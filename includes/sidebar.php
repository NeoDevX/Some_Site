<div class="block">
	<h3>Information</h3>
	<div class="block__content">
		<div class="block__content-image">
			<img class="p-3" src="../src/images/map.png" alt="image" style="width: 100%; margin-left: -10px">
		</div>
	</div>
</div>

<div class="top__articles">
	<h3>Hot Articles</h3>
	<div class="block__content">
		<div class="articles articles__vertical">

			<?php
				$top__articles = mysqli_query($connection, 'SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5');

				while ($article = mysqli_fetch_assoc($top__articles))
				{
					?>
					<div class="article">
						<div class="article__image" style="background-image: url(../src/images/<?php echo $article['image'] ?>);">
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

<div class="top__articles">
	<h3>Comments</h3>
	<div class="block__content">
		<div class="articles articles__vertical">

			<?php
				$comments = mysqli_query($connection, 'SELECT * FROM `comments` ORDER BY `pubdate` DESC LIMIT 5');

				while ($comment = mysqli_fetch_assoc($comments))
				{
					?>
					<div class="article">
						<div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125);">
						</div>
						<div class="article__info">			
							<a href="#" class="article__title"><?php echo $comment['author']; ?></a>
							<div class="article__info-meta">
								<small>Login: <?php echo $comment['login']; ?></small>
							</div>
							<div class="article__info-preview">
								<?php
									echo mb_substr($comment['text'], 0, 80, 'utf-8') . ' ...';
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