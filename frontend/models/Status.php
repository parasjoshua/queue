<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_status".
 *
 * @property int $id
 * @property string $description
 * @property int $date_added
 * @property int $added_by
 *
 * @property TblTransactionType[] $tblTransactionTypes
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'date_added', 'added_by'], 'required'],
            [['description'], 'string'],
            [['date_added', 'added_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'date_added' => 'Date Added',
            'added_by' => 'Added By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionType()
    {
        return $this->hasMany(TransactionType::className(), ['status_id' => 'id']);
    }
}
