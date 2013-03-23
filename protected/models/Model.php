<?php

/**
 * This is the model class for table "model".
 *
 * The followings are the available columns in table 'model':
 * @property integer $model_id
 * @property integer $vendor_id
 * @property integer $season_id
 * @property integer $auto_id
 * @property integer $model_year
 * @property string $model_name
 * @property string $model_url
 * @property string $model_stud
 * @property string $model_green_flag
 */
class Model extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Model the static model class
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
		return 'model';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_id, vendor_id, season_id, auto_id, model_year, model_name, model_url', 'required'),
			array('model_id, vendor_id, season_id, auto_id, model_year', 'numerical', 'integerOnly'=>true),
			array('model_name', 'length', 'max'=>255),
			array('model_url', 'length', 'max'=>64),
			array('model_stud, model_green_flag', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('model_id, vendor_id, season_id, auto_id, model_year, model_name, model_url, model_stud, model_green_flag', 'safe', 'on'=>'search'),
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
			'season_id' => 'Season',
			'auto_id' => 'Auto',
			'model_year' => 'Model Year',
			'model_name' => 'Model Name',
			'model_url' => 'Model Url',
			'model_stud' => 'Model Stud',
			'model_green_flag' => 'Model Green Flag',
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
		$criteria->compare('season_id',$this->season_id);
		$criteria->compare('auto_id',$this->auto_id);
		$criteria->compare('model_year',$this->model_year);
		$criteria->compare('model_name',$this->model_name,true);
		$criteria->compare('model_url',$this->model_url,true);
		$criteria->compare('model_stud',$this->model_stud,true);
		$criteria->compare('model_green_flag',$this->model_green_flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}