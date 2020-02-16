<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_type".
 *
 * @property int $task_id
 * @property string $task_type
 */
class TaskType extends \yii\db\ActiveRecord
{
    const TASK_CRITICAL = 1;
    const TASK_MAJOR = 2;
    const TASK_MINOR = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }
}
