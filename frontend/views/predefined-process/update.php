<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PredefinedProcess */

$this->title = 'Update Predefined Process: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Predefined Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="predefined-process-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
