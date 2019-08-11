<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionType */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Transaction Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaction-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'code',
            'description:ntext',
            [
                'attribute' => 'status_id',
                'value' => function($model){
                    return $model->status->description;
                }
            ],
             [
                'attribute' => 'department',
                'value' => function($model){
                    return $model->departmentname->name;
                }
            ],
            'window_num',
            'date_added:date',
             [
                'attribute' => 'added_by',
                'value' => function($model){
                    return Yii::$app->user->identity->profile->name;
                }
            ],
        ],
    ]) ?>

</div>
