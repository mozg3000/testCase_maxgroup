<?php

namespace app\modules\Axo\controllers;

use app\controllers\BaseController;
use app\modules\Axo\controllers\actions\equipmenttype\CreateEquipmentType;

class EquipmentTypeController extends BaseController
{
    public function actions()
    {
        return [
            'create' => CreateEquipmentType::class
        ];
    }
}