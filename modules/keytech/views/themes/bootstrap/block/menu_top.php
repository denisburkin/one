<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<h3><a class="brand" href="http://key-tech.ru/" target="_blank">Ключевая технология</a></h3>
			<div class="nav-collapse">

				<? if (Auth::instance()->logged_in()): ?>
				<ul class="nav">

					<?foreach ($config["menu"][$menu] as $name=> $link):?>
					<li <?=((isset($_SERVER['PATH_INFO']) AND $_SERVER['PATH_INFO'] == $link) ? 'class="active"' : '')?>>
						<a href="<?=$link?>"><?=$name?></a></li>
					<?endforeach;?>

				</ul>


				<ul class="nav pull-right">
					<li><a href="/logout">Выйти</a></li>
					<li><a href="/" target="_blank">Сайт</a></li>
				</ul>

				<? else: ?>
				<ul class="nav pull-right">
					<li><a href="/login">Войти</a></li>
					<li><a href="/user/register">Регистрация</a></li>
				</ul>
				<? endif;?>
			</div>
		</div>
	</div>
</div>

