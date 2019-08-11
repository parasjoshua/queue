<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_transaction".
 *
 * @property int $id
 * @property int $emp_id
 * @property string $date_added
 * @property int $status_id
 * @property int $predefined_trans_id
 *
 * @property TblPredefinedTrans $predefinedTrans
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'status_id', 'predefined_trans_id'], 'integer'],
            [['date_added', 'status_id', 'predefined_trans_id'], 'required'],
            [['date_added'], 'safe'],
            [['predefined_trans_id'], 'exist', 'skipOnError' => true, 'targetClass' => PredefinedProcess::className(), 'targetAttribute' => ['predefined_trans_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Employee',
            'date_added' => 'Date Added',
            'status_id' => 'Status',
            'predefined_trans_id' => 'Predefined Process',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredefinedProcess()
    {
        return $this->hasOne(PredefinedProcess::className(), ['id' => 'predefined_trans_id']);
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_count' => 'emp_ids']);
    }
}
