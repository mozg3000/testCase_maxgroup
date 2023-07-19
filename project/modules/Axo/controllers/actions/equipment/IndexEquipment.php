<?php

namespace app\modules\Axo\controllers\actions\equipment;

use app\modules\models\search\EquipmentSearch;
use yii\base\Action;
use yii\web\Request;

class IndexEquipment extends Action
{
    public function run(Request $request)
    {
        $searchModel = new EquipmentSearch();
        $dataProvider = $searchModel->search($request->queryParams);
        return $this->controller->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }
}