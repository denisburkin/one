<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="/public/vendor/bootstrap-3.3.2/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/public/cms/css/admin.css"/>

	<script type="text/javascript" src="/public/vendor/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="/public/vendor/bootstrap-3.3.2/js/bootstrap.min.js"></script>
</head>

<body>

<div id="menu" class="buttons"></div>

<div class="container" id="container">
	<div style="height: 55px;"></div>
	<? echo $content; ?>
	<div style="height: 65px;"></div>
</div>

<footer>
	<hr/>
	<p>&copy; Ключевая технология</p>
</footer>

</body>
</html>