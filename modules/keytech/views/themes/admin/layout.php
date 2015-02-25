<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="/this/vendor/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/this/css/admin/admin.css"/>

	<script type="text/javascript" src="/this/vendor/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/this/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<div id="menu" class="buttons">
</div>

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