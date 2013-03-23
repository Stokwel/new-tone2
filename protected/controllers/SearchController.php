<?php

class SearchController extends Controller
{
	public $layout = 'column1';

    public function actionIndex()
    {
        $this->render('index');
    }

	public function actionSearch()
	{
        if (!isset($_POST['vehicle'])) {
            Yii::app()->end();
        }

		$vehicle = $_POST['vehicle'];

		$vehicle = SearchByVehicle::selection($vehicle);
		echo(json_encode($vehicle));

		Yii::app()->end();
	}

    public function actionGetCars()
    {
        if (!isset($_POST['vendor'])) {
            Yii::app()->end();
        }

        $vendor = $_POST['vendor'];

        $cars = SearchByVehicle::getCarsByVendor($vendor);
        echo(json_encode($cars));

        Yii::app()->end();
    }

    public function actionGetYears()
    {
        if (!isset($_POST['vendor']) || !isset($_POST['car'])) {
            Yii::app()->end();
        }

        $vendor = $_POST['vendor'];
        $car = $_POST['car'];

        $years = SearchByVehicle::getYears($vendor, $car);
        echo(json_encode($years));

        Yii::app()->end();
    }

    public function actionGetMods()
    {
        if (!isset($_POST['vendor'])
        || !isset($_POST['car'])
        || !isset($_POST['year'])) {
            Yii::app()->end();
        }

        $vendor = $_POST['vendor'];
        $car = $_POST['car'];
        $year = $_POST['year'];

        $mods = SearchByVehicle::getMods($vendor, $car, $year);
        echo(json_encode($mods));

        Yii::app()->end();
    }

    public function actionGetData()
    {
        if (!isset($_POST['vendor'])
        || !isset($_POST['car'])
        || !isset($_POST['year'])
        || !isset($_POST['mod'])) {
            Yii::app()->end();
        }

        $vendor = $_POST['vendor'];
        $car = $_POST['car'];
        $year = $_POST['year'];
        $mod = $_POST['mod'];

        $data = SearchByVehicle::getData($vendor, $car, $year, $mod);
        SearchByVehicle::_print_data($data);

        Yii::app()->end();
    }
}
