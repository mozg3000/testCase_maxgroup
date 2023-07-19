<?php

namespace app\modules\Axo\controllers\actions\equipment;

use app\models\Equipment\Equipment;
use app\models\Equipment\EquipmentType;
use app\models\User\User;
use app\models\User\UserEquipment;
use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Request;

class CreateEquipment extends Action
{
    public function run(Request $request)
    {
        $equipment  = new Equipment();
        $userModels = User::find()->all();
        $users      = ArrayHelper::map($userModels, 'id', 'name');
        array_unshift($users, '');
        $equipmentTypes = EquipmentType::find()->all();
        $types = ArrayHelper::map($equipmentTypes, 'id', 'name');

        if ($request->isPost) {
            $equipment->load($request->post());
            $equipment->setScenario(Equipment::SCENARIO_CREATE);
            $transactionDb = Yii::$app->db->beginTransaction();
            if ($equipment->validate()) {
                try {
                    if(!$equipment->save()) {
                        throw new Exception('Оборудование не сохранилось');
                    }
                    $userEquipment = new UserEquipment();
                    $userEquipment->load($request->post());
                    if ($userEquipment->user_id !== '0') {
                        $userEquipment->equipment_id = $equipment->id;
                        $userEquipment->rent_status = UserEquipment::RENT_STATUS_ACTIVE;
                        if (!$userEquipment->save()) {
                            throw new Exception('Аренда не сохранилась');
                        }
                    }
                    $transactionDb->commit();
                    return $this->controller->redirect(['equipment/index']);
            } catch (\Throwable $e) {
                    $transactionDb->rollBack();
                }
            }
        }

        return $this->controller->render('create', [
            'equipment' => $equipment,
            'types'     => $types,
            'users'     => $users
        ]);
    }
}