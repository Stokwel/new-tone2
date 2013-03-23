<?php

/**
 * This is the model class for table "vendor".
 *
 * The followings are the available columns in table 'vendor':
 * @property integer $vendor_id
 * @property string $vendor_name
 * @property string $vendor_url
 */
class Vendor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vendor the static model class
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
		return 'vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_id, vendor_name, vendor_url', 'required'),
			array('vendor_id', 'numerical', 'integerOnly'=>true),
			array('vendor_name', 'length', 'max'=>255),
			array('vendor_url', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vendor_id, vendor_name, vendor_url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vendor_id' => 'Vendor',
			'vendor_name' => 'Vendor Name',
			'vendor_url' => 'Vendor Url',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('vendor_name',$this->vendor_name,true);
		$criteria->compare('vendor_url',$this->vendor_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected  static $vendors = null;
    public static function getVendorById($id)
    {
        if (!isset(self::$vendors)) {
            self::$vendors = self::getAll();
        }

        if (isset($vendors[$id])) {
            return $vendors[$id];
        }
        else {
            return false;
        }
    }

    public static function getVendors()
    {
        if (!isset(self::$vendors)) {
            self::$vendors = self::getAll();
        }

        return self::$vendors;
    }

    public static function getAll()
    {
        $dataReader = Yii::app()->db->createCommand()->select('*')
            ->from(self::model()->tableName())->query();

        $vendors = array();
        while(($row = $dataReader->read()) !== false) {
            $vendors[$row['vendor_id']] = $row;
        }

        return $vendors;
    }

	public static function getFatVendorDataProvider($count = 15)
	{
		$sql = 'SELECT `v`.*, count(`m`.`model_id`) as `countModel` FROM `'.self::model()->tableName().'` as `v` '
			.'left join `'.Tyre::model()->tableName().'` as `m` on `v`.`vendor_id` = `m`.`vendor_id` '
			.'group by `v`.`vendor_id` order by `countModel` DESC limit '.$count;

		$dataProvider = new CSqlDataProvider($sql, array(
			'totalItemCount' => $count,
			'pagination' => false,
			'keyField' => 'vendor_url'
		));

		return $dataProvider;
	}


}