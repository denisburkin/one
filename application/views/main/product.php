
<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-bottom: 100px;">

			<h1 class="title"><?=__('ПРОДУКЦИЯ И ПРОИЗВОДСТВО');?></h1>


			<? foreach ($pages as $row):?>
					<a href="/<?=lang?>/main/product/<?=$row->id?>" class="menu1 <?=($pagesid == $row->id ? 'selected' : '')?>">
						<span > <?=$row->{((lang == 'ru') ? 'title' : 'title_en')}?></span>
					</a>
			<? endforeach;?>

			<br/>
			<?=$page->{((lang == 'ru') ? 'content' : 'content_en')}?>
		</div>
	</div>
</div>
