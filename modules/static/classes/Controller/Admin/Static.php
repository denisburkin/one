<?php defined('SYSPATH') or die('No direct script access.');

function rip_tags($string) {

    // ----- remove HTML TAGs -----
    $string = preg_replace ('/<[^>]*>/', ' ', $string);

    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space

    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));

    $string = mb_substr($string, 0, 150);

    return $string;

}

class Controller_Admin_Static extends Keytech
{
	public $title = 'Редактор статичных страниц';
	public $view = 'static/admin/index';
	public $template = 'keytech/layout';
    public $module_id = '1';
	/*
	 * Включючение проверки авторизации
	 */
	public $admin_controller = TRUE;
	public $auth_required = array('login', 'admin');

	public function before()
	{
		$this->size = Kohana::$config->load('static.size');
		parent::before();
	}

	public function action_index()
	{
/*		if (isset($_POST['update_sort']))
		{

			foreach ($_POST['sorts'] as $id => $sorts)
			{
				$static        = ORM::factory('static', $id);
				$static->sorts = $sorts;
				$static->save();
			}
			Controller::redirect('admin/static', 301);
		}

		if (isset($_POST['delete']) && isset($_POST['dalete_static']))
		{
			foreach ($_POST['delete'] as $id)
			{
				ORM::factory('static', (int)$id)->delete();
			}
			Controller::redirect('admin/static', 301);
		}*/

        $this->data['tree'] = ORM::factory('Tree')->where('module_id', '=', $this->module_id)->order_by('name', 'ASC')->find_all();
	}

    public function action_catalog_edit()
    {
        $id = Arr::get($_POST, 'id');
        $catalog = ORM::factory('Tree', $id);
        $catalog->module_id = $this->module_id;
        $catalog->name = Arr::get($_POST, 'name');
        $catalog->save();
        exit;
    }

    public function action_catalog_delete()
    {
        $id = Arr::get($_POST, 'id');
        $statics = ORM::factory('Static')->where('tree_id', '=', $id)->find_all();
        foreach($statics as $static)
        {
            DB::delete('tags_statics')->where('static_id', '=', $static->id)->execute();
            if(file_exists('./public/static/' . $static->id . '.jpg'))
            {
                unlink('./public/static/' . $static->id . '.jpg');
            }
            ORM::factory('Static', $static->id)->delete();
        }
        ORM::factory('Tree', $id)->delete();
        exit;
    }

    public function action_catalog_update()
    {
        $tree = json_encode(array_map(create_function('$obj', 'return $obj->as_array();'),ORM::factory('Tree')->where('module_id', '=', $this->module_id)->order_by('name', 'ASC')->find_all()->as_array()));
        die($tree);
    }

    public function action_catalog_load()
    {
        $id = Arr::get($_POST, 'id');
        $static = json_encode(array_map(create_function('$obj', '$str = $obj->as_array(); $str["content"] = rip_tags($str["content"]); if($str["dates_update"]){$str["dates_update"] = date("d.m.Y", $str["dates_update"]);}else{$str["dates_update"]="";}; return $str;'),ORM::factory('Static')->where('tree_id', '=', $id)->order_by('id', 'DESC')->find_all()->as_array()));
        die($static);
    }

    public function action_materials_load()
    {
        $tree_id = Arr::get($_POST, 'id');
        $materials = DB::query(
            Database::SELECT,
            'SELECT
                    statics.*
                FROM
                    statics INNER JOIN trees ON (statics.tree_id = trees.id)
                WHERE
                    trees.module_id = :id
                AND
                    statics.tree_id = :tree_id
                ORDER BY
                    statics.id DESC'
        )->as_assoc()->bind(':id', $this->module_id)->bind(':tree_id', $tree_id)->execute();
        $materials = $materials->as_array();
        foreach($materials as $key=>$value)
        {
            $materials[$key]["content"] = rip_tags($materials[$key]["content"]);
            if($materials[$key]["dates_update"])
            {
                $materials[$key]["dates_update"] = date("d.m.Y", $materials[$key]["dates_update"]);
            }
            else
            {
                $materials[$key]["dates_update"]="";
            };

        }
        die(json_encode($materials));
    }

    public function action_materials_search()
    {
        $tree_id = Arr::get($_POST, 'id');
        $keys = Arr::get($_POST, 'key');
        $sql = "";
        foreach(explode(' ', $keys) as $key=>$value)
        {
            $sql .= "AND (statics.title LIKE '%" . $value . "%' OR statics.content LIKE '%" . $value . "%' )";
        }
        $materials = DB::query(
            Database::SELECT,
            'SELECT
                    statics.*
                FROM
                    statics INNER JOIN trees ON (statics.tree_id = trees.id)
                WHERE
                    trees.module_id = :id
                AND
                    statics.tree_id = :tree_id
                    ' . $sql . '
                ORDER BY
                    statics.id DESC'
        )->as_assoc()->bind(':id', $this->module_id)->bind(':tree_id', $tree_id)->bind(':key', $key)->execute();
        $materials = $materials->as_array();
        foreach($materials as $key=>$value)
        {
            $materials[$key]["content"] = rip_tags($materials[$key]["content"]);
            if($materials[$key]["dates_update"])
            {
                $materials[$key]["dates_update"] = date("d.m.Y", $materials[$key]["dates_update"]);
            }
            else
            {
                $materials[$key]["dates_update"]="";
            };

        }
        die(json_encode($materials));
    }

    public function action_material_load()
    {
        $id = Arr::get($_POST, 'id');
        $material = ORM::factory('Static', $id);
        $tree_id = Arr::get($_POST, 'tree_id');
        $config = Kohana::$config->load('static');
        $views[] = "";
        $views[0] = "".View::factory('static/form/input')->set(array('id'=>'title','placeholder'=>'Заголовок..','class'=>'tab active in','static'=>$material));
        $views[1] = "".View::factory('static/form/cke_form')->set(array('id'=>'content','static'=>$material));
        $views[2] = "".View::factory('static/form/input')->set(array('id'=>'title_en','placeholder'=>'Заголовок..','class'=>'tab','static'=>$material));
        $views[3] = "".View::factory('static/form/cke_form')->set(array('id'=>'content_en','static'=>$material));
        if(array_key_exists($tree_id, $config) && count($config[$tree_id]) != 0)
        {
            $config = $config[$tree_id];
            $i = 4;
            foreach($config['inputs'] as $cfg)
            {
                $cfg['static'] = $material;
                if($cfg['form'] == 'input_file')
                {
                    if(file_exists('./public/static/' . $cfg['static']->id . '.jpg'))
                    {
                        $cfg['help'] = "<img src='/public/static/".$cfg['static']->id.".jpg?".time()."' width='150' align='left' /><a id='delete_photo_" . $cfg['static']->id . "' class='btn' data-id='" . $cfg['static']->id . "'>удалить</a><script>$('#delete_photo_" . $cfg['static']->id . "').bind('click', delete_photo);</script>";
                    }
                }
                elseif($cfg['form'] == 'input_tag')
                {
                    $tag = '';
                    $tags = ORM::factory('Tag')
                        ->join('tags_statics', 'INNER')
                        ->on('tag.id', '=', 'tags_statics.tag_id')
                        ->where('tags_statics.static_id', '=', $material->id)
                        ->find_all();
                    foreach($tags as $key=>$value)
                    {
                        if($key == 0)
                        {
                            $tag .= $value->name;
                        }
                        else
                        {
                            $tag .= ','.$value->name;
                        }
                    }
                    $cfg['value'] = $tag;
                }
                $views[$i] = "".View::factory('static/form/'.$cfg['form'])->set($cfg);
                $i++;
            }
        }
        die(json_encode($views));
    }

    public function action_material_edit()
    {
        $id = Arr::get($_POST, 'id');
        $material = ORM::factory('Static', $id);
        $tree_id = Arr::get($_POST, 'tree_id');
        $config = Kohana::$config->load('static');
        $material->title = Arr::get($_POST, 'title');
        $material->content = Arr::get($_POST, 'content');
        $material->title_en = Arr::get($_POST, 'title_en');
        $material->content_en = Arr::get($_POST, 'content_en');
        $material->url = $material->url;
        if(array_key_exists($tree_id, $config) && count($config[$tree_id]) != 0)
        {
            $config = $config[$tree_id];
            foreach($config['inputs'] as $add)
            {
                if($add['form'] != 'input_file')
                {
                    if($add['form'] == 'input_tag')
                    {
                        $tags = explode(',', Arr::get($_POST, $add['id']));
                    }
                    else
                    {
                        $material->$add['id'] = Arr::get($_POST, $add['id']);
                    }
                }
            }
        }
        $material->tree_id = $tree_id;
        $material->dates_update = time();
        $material->save();
        $id = $material->id;
        if(isset($tags))
        {
            DB::delete('tags_statics')->where('static_id', '=', $id)->execute();
            foreach($tags as $tag)
            {
                $orm = ORM::factory('Tag')->where('name', '=', $tag)->find();
                if($orm->name == '')
                {
                    $orm->name = $tag;
                    $orm->save();
                }
                $tag_stat = ORM::factory('Tags_Static');
                $tag_stat->tag_id = $orm->id;
                $tag_stat->static_id = $id;
                $tag_stat->save();
            }
        }
        exit();
    }

    public function action_photo_save()
    {
        $id = Arr::get($_POST, 'id');
        $tree_id = Arr::get($_POST, 'tree_id');
        $input = Arr::get($_POST, 'input');
        if (isset($_FILES[$input]) AND is_uploaded_file($_FILES[$input]['tmp_name']))
        {
            $dir = './public/static/';
            $filename = Upload::save($_FILES[$input], 'my_temp_image.png', $dir, 0777);
            $img      = Image::factory($filename);
            $img->resize(1920, NULL, Image::WIDTH);
            $img->save($dir . $id . '.jpg', 90);
            unlink($filename);
        }
        exit();
    }

    public function action_material_delete()
    {
        $id = Arr::get($_POST, 'id');
        DB::delete('tags_statics')->where('static_id', '=', $id)->execute();
        if(file_exists('./public/static/' . $id . '.jpg'))
        {
            unlink('./public/static/' . $id . '.jpg');
        }
        ORM::factory('Static', $id)->delete();
        exit;
    }

    public function action_delete_photo()
    {
        $id  = Arr::get($_POST, 'id');
        if(file_exists('./public/static/' . $id . '.jpg'))
        {
            unlink('./public/static/' . $id . '.jpg');
        }
        die();
    }

    public function action_get_tags()
    {
        $tags = ORM::factory('Tag')->order_by('name', 'ASC')->find_all()->as_array("id", "name");
        die(json_encode($tags));
    }

/*
	public function action_view()
	{
		$id = (int)$this->request->param('id');

		$static = ORM::factory('static', $id);

		$static->view = (($static->view == 1) ? 0 : 1);
		$static->save();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Datum aus Vergangenheit
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");
		Controller::redirect('admin/static/', 301);
	}

	public function action_delete_photo()
	{
		$id = (int)$this->request->param('id');

		foreach ($this->size as $value)
		{
			if (file_exists('./this/public/static/'.$id.'/'.$value.'.jpg'))
			{
				unlink('./this/public/static/'.$id.'/'.$value.'.jpg');
			}
		}

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Datum aus Vergangenheit
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", FALSE);
		header("Pragma: no-cache");

		Controller::redirect('admin/static/edit/'.$id, 301);
	}

	public function action_edit()
	{
		$this->view  = 'admin/static/edit';
		$errors      = FALSE;
		$form        = ORM::factory('static', $this->request->param('id'));
		$form->dates = ((empty($form->dates)) ? date('Y-m-d') : $form->dates);

		if (isset($_POST['title']))
		{
			try
			{
				$form->title       = Arr::get($_POST, 'title');
				$form->titleseo    = Arr::get($_POST, 'titleseo');
				$form->url         = Arr::get($_POST, 'url');
				$form->tree_id     = Arr::get($_POST, 'tree_id');
				$form->content     = Arr::get($_POST, 'content');
				$form->text        = Arr::get($_POST, 'text');
				$form->dates       = Arr::get($_POST, 'dates');
				$form->description = Arr::get($_POST, 'description');
				$form->keywords    = Arr::get($_POST, 'keywords');

				$form->save();

				if (isset($_FILES['images']) AND is_uploaded_file($_FILES['images']['tmp_name']))
				{
					$dir = './public/static/'.$form->id.'/';

					if (!file_exists($dir))
					{
						mkdir($dir);
					}

					$filename = Upload::save($_FILES['images'], 'my_temp_image.png', $dir, 0777);
					$img      = Image::factory($filename);

					$img->save($dir.'original.jpg');

					unlink($filename);

					foreach ($this->size as $value)
					{
						if (file_exists('./public/static/'.$form->id.'/'.$value.'.jpg'))
						{
							unlink('./public/static/'.$form->id.'/'.$value.'.jpg');
						}
					}
				}

				Controller::redirect('admin/static/', 301);
			} catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
			}
		}

		$tree = new model_tree();

		$this->data['tree']   = $tree->get_fulltree();
		$this->data['form']   = $form;
		$this->data['errors'] = $errors;
	}*/
}
