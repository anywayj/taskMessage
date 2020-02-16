<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $task_id
 * @property string $task_text
 * @property string $task_type
 * @property string $task_start
 * @property string $task_end
 * @property int $task_status
 * @property string $task_created_at
 * @property string $task_updated_at
 */
class Task extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_name', 'task_description', 'task_type', 'task_start', 'task_end', 'task_created_at', 'task_updated_at'], 'required'],
            [['task_name', 'task_description'], 'string'],
            [['task_start', 'task_end', 'task_created_at', 'task_updated_at'], 'safe'],
            [['task_status', 'task_type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'task_name' => 'task_name',
            'task_description' => 'Task description',
            'task_type' => 'Task Type',
            'task_start' => 'Task Start',
            'task_end' => 'Task End',
            'task_status' => 'Task Status',
            'task_created_at' => 'Task Created At',
            'task_updated_at' => 'Task Updated At',
        ];
    }

    public function defaultSettings($model)
    {
        $model->task_created_at = date('Y-m-d H:i:s');
        $model->task_updated_at = date('Y-m-d H:i:s');
        $model->task_status = self::STATUS_ACTIVE;

        return $model;
    }

    public function getTaskTypes()
    {
        return $this->hasOne(TaskType::className(), ['id' => 'task_type']);
    }
}
