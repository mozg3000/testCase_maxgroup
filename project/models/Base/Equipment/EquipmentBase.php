<?php

namespace app\models\Base\Equipment;

use app\models\Equipment\EquipmentType;
use app\models\User\User;
use app\models\User\UserEquipment;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $name Название оборудывания
 * @property string|null $inv_no Инвентарный номер
 * @property int $id_equipment_type
 * @property string|null $created_at
 * @property string|null $update_at
 *
 * @property EquipmentType $equipmentType
 * @property User $user
 * @property UserEquipment[] $userEquipments
 */
abstract class EquipmentBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_equipment_type', 'inv_no'], 'required'],
            [['id_equipment_type'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['name', 'inv_no'], 'string', 'max' => 255],
            [['id_equipment_type'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentType::class, 'targetAttribute' => ['id_equipment_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'inv_no' => 'Inv No',
            'id_equipment_type' => 'Id Equipment Type',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[EquipmentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentType()
    {
        return $this->hasOne(EquipmentType::class, ['id' => 'id_equipment_type']);
    }

    /**
     * Gets query for [[UserEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserEquipments()
    {
        return $this->hasMany(UserEquipment::class, ['equipment_id' => 'id']);
    }
}
