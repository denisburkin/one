<form method="post" class="form-horizontal" enctype="multipart/form-data">
	<fieldset>
		<legend>
			<a href="/admin/album" class="btn btn-info" style="float: right;"><i class=" icon-arrow-left icon-white"></i> Назад</a>
            Регистрация компании
		</legend>

		<? if ($errors): ?>
		<div class="alert alert-error">
			<strong>Ой</strong>, Проверьте правильность всех полей и попробуйте снова.
		</div>
		<? endif;?>

		<div class="control-group ">
			<?=View::factory('admin/form/input')->set(array(
			'form'   => $form,
			'errors' => $errors,
			'title'  => 'Название альбома',
			'id'     => 'title'
		))?>

			<div class="form-actions">
				<button type="submit" class="btn btn-success" name="subs_save">Сохранить</button>
			</div>

	</fieldset>

</form>