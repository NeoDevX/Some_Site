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

		<?php

      $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
      if (mysqli_num_rows($article) <= 0)
      {
        ?>
          <div id="content">
            <div class="container">
              <div class="row">
                <section class="content__left col-md-8">
                  <div class="block">
                    <h3>Статья не найдена!</h3>
                    <div class="block__content">
                      <div class="full-text">
                        Запрашиваемая вами статья не существует!
                      </div>
                    </div>
                  </div>

                </section>
              </div>
            </div>
          </div>
        <?php
      }
      else
      {
        $article_info = mysqli_fetch_assoc($article);
        mysqli_query($connection,
          "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $article_info['id']);
        ?>
        <div id="content">
          <div class="container">
            <div class="row">
              <section class="content__left col-md-8">

                <div class="block p-2">
                  <a href="#"><?php echo $article_info['views']; ?> views</a>
                  <h3><?php echo $article_info['title']; ?></h3>
                  <div class="block__content">
                    <img
                      src="../src/images/<?php echo $article_info['image']; ?>"
                      alt="Image"
                      style="max-width: 100%;">
                    <div class="full-text p-3">
                      <?php echo $article_info['text']; ?>
                    </div>
                  </div>
                </div>

                

                <div class="block" id="comment-add-form">
                  <h3>Add comments</h3>
                  <div class="block__contet p-2">
                    <form class="form"
                          method="POST"
                          action="./Article.php?id=<?php echo $article_info['id']; ?> #comment-add-form">
                      <?php
                        if (isset($_POST['do_post']))
                        {
                          $errors = array();

                          if ($_POST['name'] == '')
                          {
                            $errors[] = 'Input name!';
                          }
                          if ($_POST['login'] == '')
                          {
                            $errors[] = 'Input your login!';
                          }
                          if ($_POST['email'] == '')
                          {
                            $errors[] = 'Input Email!';
                          }
                          if ($_POST['text'] == '')
                          {
                            $errors[] = 'Input comment\'s text!';
                          }

                          if (empty($errors))
                          {
                            mysqli_query($connection, "INSERT INTO `comments` (`author`, `login`, `email`, `text`, `article_id`, `pubdate`) VALUES ('" .$_POST['name']. "', '" .$_POST['login']. "', '" .$_POST['email']. "', '" .$_POST['text']. "', '" .$article_info['id']. "', NOW())");

                            echo '<span style="color: green; font-weight: bold;
                            margin-bottom: 10px; display: block;">Comment added!</span>';
                            $_POST['name'] = '';
                            $_POST['login'] = '';
                            $_POST['email'] = '';
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
                              value="<?php echo $_POST['login']; ?>">
                          </div>
                          <div class="col-md-4">
                            <input type="text" class="form__control" name="email" placeholder="Email"       value="<?php echo $_POST['email']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="form__group">
                        <textarea name="text"
                                  class="form__control"
                                  placeholder="Comment text ..."
                                  value="<?php echo $_POST['text']; ?>"
                                  style="resize: none; width: 200px; height: 200px; font-size: 18px"></textarea>
                      </div>
                      <div class="form__group">
                        <input type="submit" class="form__control" name="do_post" value="Add comment">
                      </div>
                    </form>
                  </div>
                </div>

              </section>
              <section class="content__right col-md-4">
                <?php
                  include_once "../includes/sidebar.php";
                ?>
              </section>

            </div>
          </div>
        </div>
        <?php
      }
    ?>
    </div>
  </div>

  <?php include_once '../includes/footer.php'; ?>
  <script src="../src/js/main.js"></script>

</body>
</html>