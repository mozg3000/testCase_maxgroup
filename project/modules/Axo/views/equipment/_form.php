<?php

use app\models\Equipment\Equipment;
use app\models\User\User;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;

/** @var View $this */
/** @var Equipment $equipment */
/** @var Array $types */
/** @var User[] $users */
?>

<h3>Создать инвентарную запись</h3>
<?php $eqForm = ActiveForm::begin() ?>
<?php echo $eqForm->field($equipment, 'name') ?>
<?php echo $eqForm->field($equipment, 'inv_no') ?>
<?php echo $eqForm->field($equipment, 'id_equipment_type')->dropDownList($types) ?>
<div class="form-group">
    <?php echo Html::dropDownList('UserEquipment[user_id]', '0', $users, [
        'class' => 'btn btn-primary',
        'placeholder' => 'Склад'
    ]) ?>
</div>
<?php echo Html::submitButton('Создать', [
    'class' => 'btn btn-primary'
]) ?>
<?php $eqForm::end() ?>
