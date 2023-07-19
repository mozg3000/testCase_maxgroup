<?php

namespace app\models\Base\User;

use app\models\User\UserEquipment;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $pass_hash
 * @property string|null $auth_key
 * @property string|null $pass_reset_token
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property UserEquipment[] $userEquipments
 */
abstract class UserBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pass_hash'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'pass_hash', 'auth_key', 'pass_reset_token'], 'string', 'max' => 255],
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
            'pass_hash' => 'Pass Hash',
            'auth_key' => 'Auth Key',
            'pass_reset_token' => 'Pass Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[UserEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserEquipments()
    {
        return $this->hasMany(UserEquipment::class, ['user_id' => 'id']);
    }
}
