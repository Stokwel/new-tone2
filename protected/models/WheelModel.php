<?php

/**
 * This is the model class for table "wheel_model".
 *
 * The followings are the available columns in table 'wheel_model':
 * @property integer $model_id
 * @property integer $vendor_id
 * @property string $model_name
 * @property string $model_url
 * @property string $model_type
 */
class WheelModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WheelModel the static model class
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
		return 'wheel_model';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_id, vendor_id, model_name, model_url', 'required'),
			array('model_id, vendor_id', 'numerical', 'integerOnly'=>true),
			array('model_name', 'length', 'max'=>255),
			array('model_url', 'length', 'max'=>64),
			array('model_type', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('model_id, vendor_id, model_name, model_url, model_type', 'safe', 'on'=>'search'),
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
			'model_id' => 'Model',
			'vendor_id' => 'Vendor',
			'model_name' => 'Model Name',
			'model_url' => 'Model Url',
			'model_type' => 'Model Type',
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

		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('model_name',$this->model_name,true);
		$criteria->compare('model_url',$this->model_url,true);
		$criteria->compare('model_type',$this->model_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}