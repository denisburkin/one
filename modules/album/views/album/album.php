
<legend>Альбомы</legend>
<?
foreach ($pagination->result() as $album)
{

	$thumb = ORM::factory('photo')->where('album_id', '=', $album->id)->order_by('id', 'desc')->find();
	if ($thumb != "")
	{
		echo '<a href="/album/show/'.$album->id.'" class="thumbnail" style="padding:5px;vertical-align:top;width:310px;height:100px;display:inline-block;margin:5px;">
	<p style="padding:5px;float:left;vertical-align:top"><img src="/public/album/'.$album->id.'/'.$thumb.'.jpg">';
		echo '<p>'.$album->title.'</p></p></a>';
	}
}
echo $pagination->render();
?>
