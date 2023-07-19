<?php

use app\models\Equipment\Equipment;
use app\models\User\User;
use yii\web\View;

/** @var View $this */
/** @var Equipment $equipment */
/** @var Array $types */
/** @var User[] $users */
?>

<div class="container">
    <?php echo $this->render('_form', [
         'equipment' => $equipment,
         'types'     => $types,
         'users'     => $users
    ]) ?>
</div>
