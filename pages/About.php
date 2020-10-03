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
						<section class="content__left col-md-8">
							
							<div class="block pl-2">
								<div class="content">
									<h1 class="mt-5 smile">Somthing About Me  <span>&#9786;</span></h1>
									<div class="about_img">
									</div>
									<div class="about_text">
										<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae magnam itaque voluptatum laborum quos temporibus, vel perferendis sunt incidunt, aperiam tempora facilis non obcaecati, dignissimos voluptas quae, at eveniet quo autem repellat distinctio optio atque iusto? Fugit, corporis. Quas inventore quos deleniti unde ad dignissimos optio, illum odit provident numquam facere magni fugiat iure qui excepturi voluptas, sit adipisci illo, eos harum totam, beatae eligendi omnis. Totam amet numquam similique, provident blanditiis officia praesentium ullam dolorum exercitationem ab earum, nisi aliquid doloribus corporis nostrum vitae. Aspernatur facilis deleniti sapiente harum fugiat asperiores placeat eligendi nam similique praesentium saepe sunt iste iure perferendis magnam at, maiores exercitationem earum hic tenetur qui nulla. Tenetur atque, eius ea quaerat mollitia natus praesentium accusamus possimus iure repellendus iste? Earum excepturi, ipsum temporibus nobis beatae ducimus consectetur doloribus quam eaque necessitatibus, voluptates aperiam sint, accusamus iusto voluptatum porro velit maxime eius. Pariatur voluptates adipisci magnam, earum doloremque facilis vel quaerat, enim animi molestias et cum id eveniet optio iste rem nobis, nam recusandae, non assumenda dolorem? Fugit debitis reiciendis in nostrum expedita sequi sed consectetur rerum officia! Eos harum sequi eligendi similique doloribus distinctio praesentium saepe eius quam, repudiandae dolorem, ipsum sapiente, quaerat dignissimos iste aliquam blanditiis rem laudantium nostrum molestias amet totam fuga accusantium? Deleniti repellat architecto, iure non dolor consequuntur voluptates. Veritatis quisquam, nostrum numquam! Provident ipsa, esse neque nemo eius asperiores doloribus pariatur iusto consequatur delectus voluptatem, sapiente! Corporis earum eos iusto blanditiis quis minima soluta ipsam, voluptates nesciunt, et recusandae doloremque minus voluptatibus nisi reiciendis quibusdam voluptatum ullam quidem nobis aspernatur quasi officiis labore quod. Atque corporis tenetur sequi ipsam reiciendis animi. Soluta dolor nulla repudiandae possimus accusamus aliquid laboriosam aperiam modi, adipisci exercitationem similique tempora voluptates, quidem rerum quasi, perspiciatis. Omnis quidem maxime reprehenderit quaerat fugiat odio totam vero, saepe minus reiciendis dolorem ut beatae mollitia ab porro, expedita veniam eum amet perspiciatis, deserunt. Est vitae unde modi, blanditiis id, vero sunt ipsam dicta laborum voluptate totam ea fugit molestias. Ratione suscipit id sit, voluptas iusto architecto cumque sint corporis maiores numquam reiciendis neque officiis minus quisquam natus dolorum laborum vitae qui unde.</p>
									</div>
								</div>
							</div>

							<div class="block" id="comment-add-form">
                  <h3>Add comment</h3>
                  <div class="block__content p-3">
                    <form class="form"
                          method="POST"
                          action="./article.php?id=<?php echo $article_info['id']; ?> #comment-add-form">
                      <?php
                        if (isset($_POST['do_post']))
                        {
                          $errors = array();

                          if ($_POST['name'] == '')
                          {
                            $errors[] = 'Введите имя!';
                          }
                          if ($_POST['nickname'] == '')
                          {
                            $errors[] = 'Введите ваш никнейм!';
                          }
                          if ($_POST['email'] == '')
                          {
                            $errors[] = 'Введите Email!';
                          }
                          if ($_POST['text'] == '')
                          {
                            $errors[] = 'Введите текст комментария!';
                          }

                          if (empty($errors))
                          {
                            mysqli_query($connection, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `article_id`) VALUES ('" .$_POST['name']. "', '" .$_POST['login']. "', '" .$_POST['email']. "', '" .$_POST['text']. "', NOW(), '" .$article_info['id']. "')");

                            echo '<span style="color: green; font-weight: bold;
                            margin-bottom: 10px; display: block;">Комментарий успешно добавлен!</span>';
                          }
                          else
                          {
                            echo '<span style="color: red; font-weight: bold;
                            margin-bottom: 10px; display: block;">' . $errors['0'] . '</span>';
                          }
                        }
                      ?>
                      <div class="form__group">
                        <div class="row">
                          <div class="col-md-4">
                            <input type="text" class="form__control" name="name" placeholder="Name"
                                   value="<?php echo $_POST['name']; ?>">
                          </div>
                          <div class="col-md-4">
                            <input type="text" class="form__control" name="login" placeholder="Login"
                                   value="<?php echo $_POST['nickname']; ?>">
                          </div>
                          <div class="col-md-4">
                            <input type="text" class="form__control" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form__group">
                        <textarea name="text"
                                  class="form__control"
                                  placeholder="Comment text"
                                  value="<?php echo $_POST['text']; ?>"
                                  style="resize: none; height: 150px; font-size: 18px"></textarea>
                      </div>
                      <div class="form__group">
                        <input type="submit" class="form__control" name="do_post" value="Add Comment">
                      </div>
                    </form>
                  </div>
                </div>
								

						</section>

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