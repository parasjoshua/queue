<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_predefined_trans".
 *
 * @property int $id
 * @property int $type_id
 * @property int $step_num
 * @property string $date_added
 * @property int $added_by
 *
 * @property TblTransactionType $type
 * @property TblTransaction[] $tblTransactions
 */
class PredefinedProcess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_predefined_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'step_num', 'date_added', 'added_by'], 'required'],
            [['type_id', 'step_num', 'added_by'], 'integer'],
            [['date_added'], 'safe'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TransactionType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'step_num' => 'Step Num',
            'date_added' => 'Date Added',
            'added_by' => 'Added By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionType()
    {
        return $this->hasOne(TransactionType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasMany(Transaction::className(), ['predefined_trans_id' => 'id']);
    }
}
