<?php

use app\models\Equipment\EquipmentType;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;

/** @var View $this */
/** @var EquipmentType $eqType */
?>

<?php $etForm = ActiveForm::begin() ?>
<?php echo $etForm->field($eqType, 'name') ?>
<?php echo Html::submitButton('Создать', [
    'class' => 'btn btn-primary'
]) ?>
<?php $etForm::end() ?>
