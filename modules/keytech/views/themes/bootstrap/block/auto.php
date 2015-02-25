<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">Demo3</li>
		<? foreach ($menu as $name => $link)
	{
		if (strpos($link, "controller-") === 0)
		{
			$link = '/'.substr($link, 11);
		}
		else
		{
			$link = '/'.$link.'.html';
		}
		?>
		<li <?=((isset($_SERVER['PATH_INFO']) AND (strpos($_SERVER['PATH_INFO'], $link) === 0)) ? 'class="active"' : '')?>>
			<a href="<?=$link?>"><?=$name?></a>
		</li>
		<? } ?>
	</ul>
</div>