<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilya Cherepanov <ilya.cherepanov@nevosoft.ru>
 * Date: 1/9/13
 * Time: 11:31 AM
 */ 
class DefaultController extends Controller
{
    public $layout = 'admin.views.layouts.admin';

    public function actionIndex()
    {
        $this->render('index', array('links' => $this->getModule()->generateMenu()));
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow', 'users' => array('admin'),
            ),
            array(
                'deny', 'users' => array('*'),
            ),
        );
    }
}
