<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $abbr
 * @property string $name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function getDb()
    {
        return Yii::$app->tss_db;
    }

    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abbr', 'name'], 'required'],
            [['abbr'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'abbr' => 'Abbr',
            'name' => 'Name',
        ];
    }
}
