<?php

namespace app\models\Base\User;


use app\models\Equipment\Equipment;
use app\models\User\User;

/**
 * This is the model class for table "user_equipment".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $equipment_id
 * @property string|null $rent_start_date Дата выдачи
 * @property string|null $rent_end_date Дата возврата
 * @property int|null $rent_status Статус аренды
 * @property string|null $created_at
 * @property string|null $update_at
 *
 * @property Equipment $equipment
 * @property User $user
 */
abstract class UserEquipmentBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'equipment_id', 'rent_status'], 'integer'],
            [['rent_start_date', 'rent_end_date', 'created_at', 'update_at'], 'safe'],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['equipment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'equipment_id' => 'Equipment ID',
            'rent_start_date' => 'Rent Start Date',
            'rent_end_date' => 'Rent End Date',
            'rent_status' => 'Rent Status',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
