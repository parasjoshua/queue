<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_count
 * @property string $payroll_number
 * @property string $employee_name
 * @property int $department
 * @property int $section
 */
class Employee extends \yii\db\ActiveRecord
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
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payroll_number', 'employee_name', 'department', 'section'], 'required'],
            [['department', 'section'], 'integer'],
            [['payroll_number', 'employee_name'], 'string', 'max' => 100],
            [['payroll_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_count' => 'Employee Count',
            'payroll_number' => 'Payroll Number',
            'employee_name' => 'Employee Name',
            'department' => 'Department',
            'section' => 'Section',
        ];
    }
}
