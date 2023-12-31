<?php

namespace app\modules\Admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='AdminPageLayout';
        return $this->render('index');
    }
}
