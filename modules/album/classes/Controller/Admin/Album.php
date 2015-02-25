<?php defined('SYSPATH') or die('No direct script access.');

// Restore session that came from SWFUpload
if (isset($_REQUEST['PHPSESSID'])) {
    session_id($_REQUEST['PHPSESSID']);
}

class Controller_Admin_Album extends Keytech
{
    public $title = 'Редактор альбома';
    public $view = '/album/admin/index';
    public $template = 'keytech/layout';
    public $module_id = '2';
    /*
     * Включючение проверки авторизации
     */
    public $admin_controller = TRUE;
    public $auth_required = array('login', 'admin');

    public function action_index()
    {
        $this->data['tree'] = ORM::factory('Tree')->where('module_id', '=', '2')->order_by('name', 'ASC')->find_all();
    }

    public function action_catalog_load()
    {
        $id = Arr::get($_POST, 'id');
        $table = json_encode(array_map(create_function('$obj', 'return $obj->as_array();'), ORM::factory('Photo')->where('tree_id', '=', $id)->order_by('sorts', 'ASC')->find_all()->as_array()));

        die($table);


        /*
        $id = Arr::get($_POST, 'id');
        $load = ORM::factory('Photo')->where('tree_id', '=', $id)->order_by('id', 'DESC')->find_all();

        $this->data['table'] = $load;
        */
    }

    public function action_edit()
    {
        $this->view = 'album/admin/edit';
        $errors = FALSE;
        $form = ORM::factory('Tree', $this->request->param('id'));

        if (isset($_POST['subs_save'])) {
            try {
                $form->title = Arr::get($_POST, 'title');
                $form->save();

                Request::initial()->redirect('admin/album/', 301);
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }

        $this->data['form'] = $form;
        $this->data['errors'] = $errors;
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

    public function action_photo_edit(){
        $id = Arr::get($_POST, 'id');
        $photo = ORM::factory('Photo', $id);
        $photo->title = Arr::get($_POST, 'title');
        $photo ->save();
        exit;
    }

    public function action_catalog_delete()
    {
        $id = Arr::get($_POST, 'id');
        $file_dir = './public/album/' . $id . '/';
        $photos = ORM::factory('Photo')->where('tree_id', '=', $id)->find_all();
        foreach($photos as $photo)
        {
            if (file_exists($file_dir . $photo->id . '.jpg')){
                unlink($file_dir . $photo->id . '.jpg');
            }
            if (file_exists($file_dir . $photo->id . '_big.jpg')){
                unlink($file_dir . $photo->id . '_big.jpg');
            }
            ORM::factory('Photo', $photo->id)->delete();
        }
        if(file_exists($file_dir))
        {
            rmdir($file_dir);
        }
        ORM::factory('Tree', $id)->delete();
        exit;
    }

    public function action_catalog_update()
    {
        $tree = DB::query(
            Database::SELECT,
            'SELECT
                        *, trees.id AS tree
                    FROM
                        trees LEFT OUTER JOIN photos ON (trees.id = photos.tree_id)
                    WHERE
                        trees.module_id = :id
                    GROUP BY
                        trees.id
                    ORDER BY
                        trees.name ASC'
        )->as_object()->bind(':id', $this->module_id)->execute();
        die(json_encode($tree->as_array()));
    }

    public function action_thumb()
    {
        $id = Arr::get($_POST, 'id');
        $photo = json_encode(ORM::factory('Photo')->where('tree_id', '=', $id)->find()->as_array());
        die($photo);
    }

    public function action_addtext()
    {
        $this->view = 'album/admin/addtext';
        if (isset($_POST['send'])) {
            foreach ($_POST['title'] as $id => $text) {
                $photo = ORM::factory('Photo', $id);
                $photo->title = $text;
                $photo->info = $_POST['info'][$id];
                $photo->save();
            }
        }
        $this->data['table'] = ORM::factory('Photo')->where('tree_id', '=', $this->request->param('id'))->find_all();
    }

    public function action_addphoto()
    {
        $id = Arr::get($_POST, 'id');
        $this->data['tree'] = ORM::factory('Tree')->where('module_id', '=', $this->module_id)->order_by('name', 'ASC')->find_all();
        $this->data['table'] = ORM::factory('Photo')->where('tree_id', '=', $id)->order_by('sorts', 'asc')->find_all();
    }

    public function action_upload()
    {
        if (!isset($_FILES["upl"]) OR !is_uploaded_file($_FILES["upl"]["tmp_name"]) OR $_FILES["upl"]["error"] != 0) {
            echo "ERROR:Файл не загружен";
            exit(0);
        }

        $dir = './public/album/' . $this->request->param('id') . '/';


        if (!file_exists('./public/album/')) {
            mkdir('./public/album/') or die('create error dir: ./public/album/');
        }

        if (!file_exists($dir)) {
            mkdir($dir) or die('create error dir: ' . $dir);
        }

        $filename = Upload::save($_FILES['upl'], NULL, $dir, 0777);

        $photo = ORM::factory('Photo');
        $photo->tree_id = $this->request->param('id');
        $photo->save();


        // Размеры, до которых будем обрезать
        $size_width = 1920;
        $size_height = 1080;

        // Открываем изображение
        $image = Image::factory($filename);
        $image->resize($size_width, $size_height, Image::HEIGHT);
        $image->save($dir . $photo->id . '_big.jpg', 80);

        unset($image);

        // Размеры, до которых будем обрезать
        $size_width = 400;
        $size_height = 400;

        // Открываем изображение
        $img = Image::factory($filename);

        // Подсчитываем соотношение сторон картинки
        $ratio = $img->width / $img->height;

        // Соотношение сторон нужных размеров
        $original_ratio = $size_width / $size_height;

        // Размеры, до которых обрежем картинку до масштабирования
        $crop_width = $img->width;
        $crop_height = $img->height;
        // Смотрим соотношения
        if ($ratio > $original_ratio) {
            // Если ширина картинки слишком большая для пропорции,
            // то будем обрезать по ширине
            $crop_width = round($original_ratio * $crop_height);
        } else {
            // Либо наоборот, если высота картинки слишком большая для пропорции,
            // то обрезать будем по высоте
            $crop_height = round($crop_width / $original_ratio);
        }
        // Обрезаем по высчитанным размерам до нужной пропорции
        $img->crop($crop_width, $crop_height, null, 0);


        $img->resize($size_width, $size_height, Image::HEIGHT)->save($dir . $photo->id . '.jpg');

        unlink($filename);

        die("" . $this->request->param('id') . '/' . $photo->id);

    }

    public function action_delete()
    {
        $file_dir = './public/album/' . (int)$_POST['tree_id'];

        if (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $id) {
                ORM::factory('Photo', $id)->delete();

                if (file_exists($file_dir . '/' . $id . '.jpg'))
                    unlink($file_dir . '/' . $id . '.jpg');

                if (file_exists($file_dir . '/' . $id . '_big.jpg'))
                    unlink($file_dir . '/' . $id . '_big.jpg');
            }
        }
        die('ok');
    }

    public function action_update()
    {


        if (isset($_POST['update'])) {
            $m = 1;
            foreach ($_POST['update'] as $id) {
                $photo = ORM::factory('Photo', $id);
                $photo->sorts = $m;
                $photo->save();
                $m++;
            }
        }
        die('ok');
    }

    public function addImage()
    {


    }

}
