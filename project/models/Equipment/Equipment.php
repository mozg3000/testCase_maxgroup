<?php

namespace app\models\Equipment;

use app\models\Base\Equipment\EquipmentBase;
use app\models\User\User;
use app\models\User\UserEquipment;
use yii\db\ActiveQuery;

/**
 * @property User $user
 *
 * @property UserEquipment $userEquipmentActive
 */
class Equipment extends EquipmentBase
{
    public const SCENARIO_CREATE = 'create_equipment_record';
    public const SCENARIO_UPDATE = 'update_equipment_record';

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Название оборудования',
            'inv_no' => 'Инвентарный номер',
            'id_equipment_type' => 'Тип оборудования',
            'created_at' => 'Дата создания',
            'update_at' => 'Дата обновления',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),
            [
                [['inv_no'], 'unique', 'on' => static::SCENARIO_CREATE],
                [['inv_no'], 'exist', 'on' => static::SCENARIO_UPDATE,]
            ],
        );
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        return array_merge(parent::scenarios(), [
            static::SCENARIO_CREATE => [
                'name',
                'inv_no',
                'id_equipment_type'
            ],
            static::SCENARIO_UPDATE => [
                'name',
                'inv_no',
                'id_equipment_type'
            ]
        ]);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id'])->via('userEquipmentActive');
    }

    public function getUserEquipmentActive(): ActiveQuery
    {
        return $this->hasOne(UserEquipment::class, ['equipment_id' => 'id'])->andWhere(['rent_status' => UserEquipment::RENT_STATUS_ACTIVE]);
    }
}