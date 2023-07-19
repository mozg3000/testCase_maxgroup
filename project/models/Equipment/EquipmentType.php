<?php

namespace app\models\Equipment;

use app\models\Base\Equipment\EquipmentTypeBase;

class EquipmentType extends EquipmentTypeBase
{
    public const SCENARIO_CREATE = 'create_equipment_type';
    public const SCENARIO_UPDATE = 'update_equipment_type';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name'], 'unique', 'on' => static::SCENARIO_CREATE],
            [['name'], 'exist', 'on' => static::SCENARIO_UPDATE],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        return array_merge(parent::scenarios(), [
            static::SCENARIO_CREATE => [
                'name'
            ],
            static::SCENARIO_UPDATE => [
                'name'
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Новвый тип оборудования'
        ];
    }
}