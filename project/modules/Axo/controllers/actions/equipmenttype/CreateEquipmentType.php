<?php

namespace app\modules\Axo\controllers\actions\equipmenttype;

use app\models\Equipment\EquipmentType;
use yii\base\Action;
use yii\web\Request;

class CreateEquipmentType extends Action
{
    public function run(Request $request)
    {
        $eqType = new EquipmentType();

        if ($request->isPost) {
            $eqType->setScenario(EquipmentType::SCENARIO_CREATE);
            if ($eqType->load($request->post()) && $eqType->save()) {
                return $this->controller->redirect(['equipment-type/index']);
            }
        }

        return $this->controller->render('create', [
            'eqType' => $eqType
        ]);
    }
}