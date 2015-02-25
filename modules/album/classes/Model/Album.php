<?php
class Model_Static extends ORM
{
    public function rules()
    {
        return array(
            'title' => array(
                array('not_empty'),
            )
        );
    }

    public function unique_url($url)
    {
        $db = DB::select(array(DB::expr('COUNT(url)'), 'total'))->from('statics')->where('url', '=', $url);

        if ($this->id) {
            $db->where('id', '<>', $this->id);
        }
        return !$db->execute()->get('total');
    }

    public function filters()
    {
        return array(
            'url'   => array(
                array('trim'),
            ),
            'title' => array(
                array('trim'),
            ),
            'dates' => array(
                array('trim')
            ),
        );
    }

//    protected $_load_with = array('tree');
    protected $_belongs_to = array(
        'tree' => array(),
    );
}