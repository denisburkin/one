<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">Demo2</li>
		<? foreach ($config["menu"][$menu] as $name => $link){ ?>
		<li <?=(($link != '/' AND isset($_SERVER['PATH_INFO']) AND (strpos($_SERVER['PATH_INFO'],$link) === 0 )) ? 'class="active"' : '')?>>
			<a href="<?=$link?>"><?=$name?></a>
		</li>
		<? } ?>
	</ul>
</div>