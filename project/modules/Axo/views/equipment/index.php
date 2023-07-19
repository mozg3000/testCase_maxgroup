<?php
use yii\web\View;

/** @var View $this */

?>

<?php
echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $searchModel->columns
])
?>
