<?php

/**
 * This is the model class for table "wheel_model_size".
 *
 * The followings are the available columns in table 'wheel_model_size':
 * @property integer $size_id
 * @property integer $model_id
 * @property integer $width
 * @property integer $radius
 * @property integer $pcd_first
 * @property integer $pcd_second
 * @property integer $dia
 * @property integer $et
 */
class WheelModelSize extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WheelModelSize the static model class
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
		return 'wheel_model_size';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_id, width, radius, pcd_first, pcd_second, dia, et', 'required'),
			array('model_id, width, radius, pcd_first, pcd_second, dia, et', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('size_id, model_id, width, radius, pcd_first, pcd_second, dia, et', 'safe', 'on'=>'search'),
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
			'width' => 'Width',
			'radius' => 'Radius',
			'pcd_first' => 'Pcd First',
			'pcd_second' => 'Pcd Second',
			'dia' => 'Dia',
			'et' => 'Et',
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
		$criteria->compare('width',$this->width);
		$criteria->compare('radius',$this->radius);
		$criteria->compare('pcd_first',$this->pcd_first);
		$criteria->compare('pcd_second',$this->pcd_second);
		$criteria->compare('dia',$this->dia);
		$criteria->compare('et',$this->et);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}