<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_transaction_type".
 *
 * @property int $id
 * @property int $code
 * @property string $description
 * @property int $status_id
 * @property int $department
 * @property int $window_num
 * @property string $date_added
 * @property int $added_by
 *
 * @property TblPredefinedTrans[] $tblPredefinedTrans
 * @property TblStatus $status
 */
class TransactionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_transaction_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'status_id', 'department', 'window_num', 'added_by'], 'integer'],
            [['description', 'status_id', 'department', 'window_num', 'date_added', 'added_by'], 'required'],
            [['description'], 'string'],
            [['date_added'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'description' => 'Description',
            'status_id' => 'Status ID',
            'department' => 'Department',
            'window_num' => 'Window Num',
            'date_added' => 'Date Added',
            'added_by' => 'Added By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredefinedProcess()
    {
        return $this->hasMany(PredefinedProcess::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
