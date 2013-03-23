<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('isMain', 'length', 'max' => 1),
			array('url, title, description, keywords, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, description, keywords', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	protected  function beforeSave()
	{
		if (!parent::beforeSave()) {
			return false;
		}

		if (empty($this->url)) {
			$this->url = Transliter::translit($this->name);
		}

		return true;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Заголовок',
			'content' => 'Содержимое',
			'url' => 'Название страницы в адресной строке',
			'isMain' => 'Использовать на главной странице',
			'title' => 'Название',
			'description' => 'Описание',
			'keywords' => 'Ключевые слова',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function makeMain($id)
	{

	}

	public static function getMain()
	{
		$dataReader = Yii::app()->db->createCommand()->select('*')->from(self::model()->tableName())
			->where('isMain = 1')->query();

		$page = null;
		if (($row = $dataReader->read()) !== false) {
			$page = self::model();
			$page->setAttributes($row, false);
		}

		return $page;
	}

    public static function getAll()
    {
        $dataReader = Yii::app()->db->createCommand()->select('*')->from(self::model()->tableName())->query();

        $result = array();
        while (($row = $dataReader->read()) !== false) {
            $result[$row['id']] = $row;
        }

        return $result;
    }
}