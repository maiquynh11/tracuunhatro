<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * NhatroController implements the CRUD actions for Nhatro model.
 */
class MapController extends Controller {
    public function actionIndex() {
        return $this->renderPartial("index");
    }
}