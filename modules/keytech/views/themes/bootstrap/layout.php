<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="/this/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/this/css/style.css"/>
</head>

<body>

<div class="container" id="container">
	<div class="row">

		<div class="span3">

			left
			<br/>

			<? if (isset($ulogin_errors['email'])) echo "<div class='alert alert-error'><b>Ой</b>, Вы зарегистрированы через другую соц.сеть, попробуйте другую.</div>";?>

			<? if(Auth::instance()->logged_in('admin')) {?>
            <a href="/admin/static">Панель администратора</a><br/>
			<? }?>
			<? if(Auth::instance()->logged_in()){?>
			<a href="/logout">Выйти из: <strong><?=(( isset(Auth::instance()->get_user()->username))  ? Auth::instance()->get_user()->username : 'admin' )?></strong></a>
			<? } else echo '<strong>Войти через:</strong>'. Ulogin::factory()->render();?>

		</div>

		<div class="span7">
			<?=$content;?>
<!--			<div id="kohana-profiler">--><?//=View::factory('profiler/stats')?><!--</div>-->
		</div>

		<div class="span2">
			right
		</div>

	</div>

	<div class="row">
		<div class="span12">
            <p>Key-Tech © <?=date('Y');?></p>
		</div>
	</div>
</div>
</body>
</html>