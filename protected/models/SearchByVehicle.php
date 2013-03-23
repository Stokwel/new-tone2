<?php

/**
 * This is the model class for table "search_by_vehicle".
 *
 * The followings are the available columns in table 'search_by_vehicle':
 * @property integer $id
 * @property string $vendor
 * @property string $car
 * @property string $year
 * @property string $modification
 * @property string $param_pcd
 * @property string $param_dia
 * @property string $param_nut
 * @property string $param_bolt
 * @property string $tyres_factory
 * @property string $tyres_replace
 * @property string $tyres_tuning
 * @property string $wheels_factory
 * @property string $wheels_replace
 * @property string $wheels_tuning
 */
class SearchByVehicle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SearchByVehicle the static model class
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
		return 'search_by_vehicle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('vendor, car, year, modification, param_pcd, param_dia, param_nut, param_bolt, tyres_factory, tyres_replace, tyres_tuning, wheels_factory, wheels_replace, wheels_tuning', 'required'),
			array('vendor, car, year, modification', 'length', 'max'=>255),
			array('param_pcd, param_nut, param_bolt', 'length', 'max'=>32),
			array('param_dia', 'length', 'max'=>8),
			array('id, vendor, car, year, modification, param_pcd, param_dia, param_nut, param_bolt, tyres_factory, tyres_replace, tyres_tuning, wheels_factory, wheels_replace, wheels_tuning', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'vendor' => 'Производитель',
			'car' => 'Модель',
			'year' => 'Год выпуска',
			'modification' => 'Модификации',
			'param_pcd' => 'Param Pcd',
			'param_dia' => 'Param Dia',
			'param_nut' => 'Param Nut',
			'param_bolt' => 'Param Bolt',
			'tyres_factory' => 'Tyres Factory',
			'tyres_replace' => 'Tyres Replace',
			'tyres_tuning' => 'Tyres Tuning',
			'wheels_factory' => 'Wheels Factory',
			'wheels_replace' => 'Wheels Replace',
			'wheels_tuning' => 'Wheels Tuning',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('vendor',$this->vendor,true);
		$criteria->compare('car',$this->car,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('modification',$this->modification,true);
		$criteria->compare('param_pcd',$this->param_pcd,true);
		$criteria->compare('param_dia',$this->param_dia,true);
		$criteria->compare('param_nut',$this->param_nut,true);
		$criteria->compare('param_bolt',$this->param_bolt,true);
		$criteria->compare('tyres_factory',$this->tyres_factory,true);
		$criteria->compare('tyres_replace',$this->tyres_replace,true);
		$criteria->compare('tyres_tuning',$this->tyres_tuning,true);
		$criteria->compare('wheels_factory',$this->wheels_factory,true);
		$criteria->compare('wheels_replace',$this->wheels_replace,true);
		$criteria->compare('wheels_tuning',$this->wheels_tuning,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getCarsByVendor($vendor)
	{
		$command = Yii::app()->db->createCommand();
		$dataReader = $command->select('car')
			->from(self::model()->tableName())
			->where('vendor = :vendor', array(
				':vendor' => $vendor
			))
			->group('car')
			->query();

		$cars = array();
		while(($row = $dataReader->read()) !== false) {
			$cars[] = $row['car'];
		}

		return $cars;
	}

	public static function getAllVendors()
	{
		$command = Yii::app()->db->createCommand();
		$dataReader = $command->select('vendor')
			->from(self::model()->tableName())
			->group('vendor')
			->query();

		$vendors = array();
		while(($row = $dataReader->read()) !== false) {
			$vendors[$row['vendor']] = $row['vendor'];
		}

		return $vendors;
	}

    public static function getYears($vendor, $car)
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('year')
            ->from(self::model()->tableName())
            ->where('vendor = :vendor and car = :car', array(
                ':vendor' => $vendor,
                ':car' => $car
            ))
            ->group('year')
            ->query();

        $years = array();
        while(($row = $dataReader->read()) !== false) {
            $years[] = $row['year'];
        }

        return $years;
    }

    public static function getMods($vendor, $car, $year)
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('modification')
            ->from(self::model()->tableName())
            ->where('vendor = :vendor and car = :car and year = :year', array(
                ':vendor' => $vendor,
                ':car' => $car,
                ':year' => $year,
            ))
            ->group('modification')
            ->query();

        $mods = array();
        while(($row = $dataReader->read()) !== false) {
            $mods[] = $row['modification'];
        }

        return $mods;
    }

    public static function getData($vendor, $car, $year, $mod)
    {
        $command = Yii::app()->db->createCommand();
        $dataReader = $command->select('*')
            ->from(self::model()->tableName())
            ->where('vendor = :vendor and car = :car and year = :year and modification = :mod', array(
                ':vendor' => $vendor,
                ':car' => $car,
                ':year' => $year,
                ':mod' => $mod,
            ))
            ->query();

        $data = array();
        while(($row = $dataReader->read()) !== false) {
            $row['tyres_factory_list'] 	= explode("|", $row['tyres_factory']);
            $row['tyres_replace_list'] 	= explode("|", $row['tyres_replace']);
            $row['tyres_tuning_list'] 	= explode("|", $row['tyres_tuning']);

            $row['wheels_factory_list'] = explode("|", $row['wheels_factory']);
            $row['wheels_replace_list'] = explode("|", $row['wheels_replace']);
            $row['wheels_tuning_list'] 	= explode("|", $row['wheels_tuning']);
            $data = $row;
        }

        return $data;
    }

    public static function _print_data($data)
    {
        echo "<h3>Параметры дисков:</h3><br>";
        echo "PCD: " . $data['param_pcd'] . ", ";

        if ( $data['param_nut'] != '' )
            echo "Гайка: " . $data['param_nut'] . ", ";

        if ( $data['param_bolt'] != '' )
            echo "Болт: " . $data['param_bolt'] . ", ";

        echo "DIA: " . $data['param_dia'] . "<br>";

        echo "<table><tr><td>";

        echo "<h3>Шины:</h3>";

        echo "<br><h4>Заводские:</h4>";
        foreach($data['tyres_factory_list'] as $tyre)
        {
            if (strpos($tyre, ",") != false)    echo str_replace(",", " (front) ", $tyre ) . " (rear)<br>";
            else                                echo $tyre . "<br>";
        }

        echo "<br><h4>Замена:</h4>";
        foreach($data['tyres_replace_list'] as $tyre)
        {
            if (strpos($tyre, ",") != false)    echo str_replace(",", " (front) ", $tyre ) . " (rear)<br>";
            else                                echo $tyre . "<br>";
        }

        echo "<br><h4>Тюнинг:</h4>";
        foreach($data['tyres_tuning_list'] as $tyre)
        {
            if (strpos($tyre, ",") != false)	echo str_replace(",", " (front) ", $tyre ) . " (rear)<br>";
            else                                echo $tyre . "<br>";
        }

        echo "</td><td>";

        echo "<h3>Диски:</h3>";

        echo "<br><h4>Заводские:</h4>";
        foreach($data['wheels_factory_list'] as $wheel)
        {
            if (strpos($wheel, ",") != false)   echo str_replace(",", " (front) ", $wheel ) . " (rear)<br>";
            else                                echo $wheel . "<br>";
        }

        echo "<br><h4>Замена:</h4>";
        foreach($data['wheels_replace_list'] as $wheel)
        {
            if (strpos($wheel, ",") != false)   echo str_replace(",", " (front) ", $wheel ) . " (rear)<br>";
            else                                echo $wheel . "<br>";
        }

        echo "<br><h4>Тюнинг:</h4>";
        foreach($data['wheels_tuning_list'] as $wheel)
        {
            if (strpos($wheel, ",") != false)   echo str_replace(",", " (front) ", $wheel ) . " (rear)<br>";
            else                                echo $wheel . "<br>";
        }

        echo "</td></tr></table>";
    }
}