<?php

namespace app\models\User;

use app\models\Base\User\UserEquipmentBase;

class UserEquipment extends UserEquipmentBase
{
    public const RENT_STATUS_ACTIVE = 1;
    public const RENT_STATUS_FINISHED = 0;
}