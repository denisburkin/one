<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                <a class="brand" href="http://key-tech.ru/" target="_blank" id="logo"><img src="/this/img/admin/logo.png" alt="" width="42" height="25"/></a>
			</a>

			<div class="nav-collapse">
				<? if (Auth::instance()->logged_in()): ?>
				<ul class="nav">
				<?
					$first = Request::current()->controller();
					$first = ($first != 'admin') ? $first : '';
					foreach ($config["menu"][$menu] as $k => $v)
					{
						?>
						<li  <? echo (($first == $k) ? 'class="active"' : '')?>>
							<a href="/admin/<?=$k;?>"><?=$v;?></a>
						</li>
				<? } ?>
				</ul>

				<ul class="nav pull-right">
					<li>
						<a href="/" target="_blank"><i class="icon-home"></i> На Главную</a>
					</li>
                    <li>
                        <a href="/logout"><i class="icon-off"></i> Выйти</a>
                    </li>
				</ul>

				<? else: ?>
				<ul class="nav pull-right">
					<li>
						<a href="/login"><i class="icon-off"></i> Войти</a>
					</li>
				</ul>
				<? endif;?>
			</div>
		</div>
	</div>
</div>


