<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Приложение - задачник</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
            <a href="/tasks/index/">Главная</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item">
				<?if(isset($_SESSION["login"])):?>
					<a href="/users/logout" class="nav-link"><?=$_SESSION["login"]?> | Выйти</a>
				<?else:?>
					<a href="/users/login/" class="nav-link">Войти</a>
				<?endif;?>
			  </li>
			</ul>
		  </div>
		</div>
	</nav>
	<div class="container">
        <?php include 'application/views/'.$content_view;?>
	</div>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>