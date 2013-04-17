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

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Page('search');
        $model->unsetAttributes();
        if (isset($_GET['Page'])) {
            $model->attributes = $_GET['Page'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }
}
