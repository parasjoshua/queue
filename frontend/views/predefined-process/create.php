<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PredefinedProcess */

$this->title = 'Create Predefined Process';
$this->params['breadcrumbs'][] = ['label' => 'Predefined Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predefined-process-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
