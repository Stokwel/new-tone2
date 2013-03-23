<?php

/**
 * This is the model class for table "model_photo".
 *
 * The followings are the available columns in table 'model_photo':
 * @property integer $photo_id
 * @property integer $model_id
 * @property string $photo_name
 */
class BusPhoto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ModelPhoto the static model class
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
		return 'model_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_id, photo_name', 'required'),
			array('model_id', 'numerical', 'integerOnly'=>true),
			array('photo_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('photo_id, model_id, photo_name', 'safe', 'on'=>'search'),
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
			'photo_id' => 'Photo',
			'model_id' => 'Model',
			'photo_name' => 'Photo Name',
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

		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('photo_name',$this->photo_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getImageUrl()
	{
		$imageName = $this->photo_name;
		$vendorEnd = strpos($imageName, '_');

		if ($vendorEnd === false) {
			return $imageName;
		}

		$vendor = substr($imageName, 0, $vendorEnd);

		$typeEnd = strpos($imageName, '.', $vendorEnd+1);
		$type = substr($imageName, $vendorEnd+1, ($typeEnd-1) - $vendorEnd);

		return sprintf('%s/%s/%s/%s',
			Yii::app()->params['tyresPhotos'], $vendor, $type, $imageName
		);
	}
}