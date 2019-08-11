<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'status_id')->widget(Select2::classname(), [
            'data' => $status,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Status'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

     <?= $form->field($model, 'department')->widget(Select2::classname(), [
            'data' => $deptlist,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Department'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'window_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
