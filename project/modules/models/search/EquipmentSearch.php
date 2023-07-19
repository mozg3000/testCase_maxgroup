<?php

namespace app\modules\models\search;

use app\models\Equipment\Equipment;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class EquipmentSearch extends Equipment
{
    public function rules(): array
    {
        return [
            'id',
            'name',
            'nv_no',
            'd_equipment_type',
            'created_at',
            'update_at'
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search($params): ActiveDataProvider
    {
        $query = Equipment::find();
        $query->joinWith('userEquipmentActive');

        $this->load($params);

        $dataProvider = new ActiveDataProvider();

        return $dataProvider;
    }
}