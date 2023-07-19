<?php

namespace app\modules\Axo\controllers;

use app\controllers\BaseController;
use app\modules\Axo\controllers\actions\equipment\CreateEquipment;
use app\modules\Axo\controllers\actions\equipment\IndexEquipment;

class EquipmentController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'create' => CreateEquipment::class,
            'list'   => IndexEquipment::class
        ];
    }
}