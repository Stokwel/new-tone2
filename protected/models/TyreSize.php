<?php

/**
 * This is the model class for table "model_size".
 *
 * The followings are the available columns in table 'model_size':
 * @property integer $size_id
 * @property integer $model_id
 * @property integer $size_width
 * @property double $size_profile
 * @property double $size_radius
 * @property integer $weight_index
 * @property string $speed_index
 * @property string $rof_flag
 * @property string $xl_flag
 * @property string $c_flag
 */
class TyreSize extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ModelSize the static model class
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
		return 'model_size';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_id, size_width, size_profile, size_radius, weight_index, speed_index', 'required'),
			array('model_id, size_width, weight_index', 'numerical', 'integerOnly'=>true),
			array('size_profile, size_radius', 'numerical'),
			array('speed_index, rof_flag, xl_flag, c_flag', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('size_id, model_id, size_width, size_profile, size_radius, weight_index, speed_index, rof_flag, xl_flag, c_flag', 'safe', 'on'=>'search'),
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
			'size_id' => 'Size',
			'model_id' => 'Model',
			'size_width' => 'Size Width',
			'size_profile' => 'Size Profile',
			'size_radius' => 'Size Radius',
			'weight_index' => 'Weight Index',
			'speed_index' => 'Speed Index',
			'rof_flag' => 'Rof Flag',
			'xl_flag' => 'Xl Flag',
			'c_flag' => 'C Flag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('size_id',$this->size_id);
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('size_width',$this->size_width);
		$criteria->compare('size_profile',$this->size_profile);
		$criteria->compare('size_radius',$this->size_radius);
		$criteria->compare('weight_index',$this->weight_index);
		$criteria->compare('speed_index',$this->speed_index,true);
		$criteria->compare('rof_flag',$this->rof_flag,true);
		$criteria->compare('xl_flag',$this->xl_flag,true);
		$criteria->compare('c_flag',$this->c_flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public static function getAllWidth()
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('size_width')
            ->from(self::model()->tableName())
            ->group('size_width')
            ->query();

        $result = array();
        while(($row = $dataReader->read()) !== false) {
            $result[$row['size_width']] = $row['size_width'];
        }

        return $result;
    }

    public static function getAllProfile()
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('size_profile')
            ->from(self::model()->tableName())
            ->group('size_profile')
            ->query();

        $result = array();
        while(($row = $dataReader->read()) !== false) {
            $result[$row['size_profile']] = $row['size_profile'];
        }

        return $result;
    }

    public static function getAllRadius()
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('size_radius')
            ->from(self::model()->tableName())
            ->group('size_radius')
            ->query();

        $result = array();
        while(($row = $dataReader->read()) !== false) {
            $result[$row['size_radius']] = $row['size_radius'];
        }

        return $result;
    }
}
