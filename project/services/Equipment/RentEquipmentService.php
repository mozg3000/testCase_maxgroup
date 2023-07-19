<?php

namespace app\services\Equipment;

use app\models\Equipment\Equipment;

class RentEquipmentService
{
    /**
     * Создаёт модель для оборудования
     * @return Equipment
     */
    public function createModel(): Equipment
    {
        return new Equipment();
    }

    public function makeRent(Equipment $equipment): bool
    {
        return $equipment->save();
    }
}
