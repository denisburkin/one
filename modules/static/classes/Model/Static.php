<?php
class Model_Static extends ORM
{/*
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
	}*/

	public function filters()
	{
		return array(
			'url'   => array(
                array(array($this, 'urlTranslIt'), array(':value', $this))
			),
            'dates' => array(
                array(array($this, 'dateFormat'), array(':value'))
            )
		);
	}
/*
//    protected $_load_with = array('tree');
	protected $_belongs_to = array(
		'tree' => array(),
	);*/
    public function translIt($str)
    {
        $tr = array(
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
            "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=> "_", "."=> "", "/"=> "_"
        );
        return strtr($str,$tr);
    }
    public function urlUnique($url, $id)
    {
        if(ORM::factory('Static')->where('id', '!=', $id)->where('url', '=', $url)->count_all()>0)
        {
            return $this->urlUniqueAdd($url, $id, 1);
        }
        else
        {
            return $url;
        }
    }
    public function urlUniqueAdd($url, $id, $add)
    {
        if(ORM::factory('Static')->where('id', '!=', $id)->where('url', '=', $url.$add)->count_all()>0)
        {
            $add++;
            return $this->urlUniqueAdd($url, $id, $add);
        }
        else
        {
            return $url.$add;
        }
    }
    public function urlTranslIt($url, $obj)
    {
        if($url == "")
        {
            $url = $obj->title;
        }
        if (preg_match('/[^A-Za-z0-9_\-]/', $url)) {
            $url = $this->translIt($url);
            $url = preg_replace('/[^A-Za-z0-9_\-]/', '', $url);
        }
        return $this->urlUnique($url, $obj->id);
    }
    public function dateFormat($date)
    {
        if($date)
        {
            $date = DateTime::createFromFormat('!d.m.Y H:i', $date);
            return date_format($date, 'U');
        }
    }
}