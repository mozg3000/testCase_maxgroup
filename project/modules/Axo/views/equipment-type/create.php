<?php

use app\models\Equipment\EquipmentType;
use yii\web\View;

/** @var View $this */
/** @var EquipmentType $eqType */
?>

<div class="container">
    <?php echo $this->render('_form', [
        'eqType' => $eqType,
    ]) ?>
</div>
