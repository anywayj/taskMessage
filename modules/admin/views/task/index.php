<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TaskType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'task_id',
            'task_name',
            'task_description:ntext',
            'task_type',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($data){
                    return $data->task_type === TaskType::TASK_CRITICAL
                    ? '<b><span class="text-success">' . $data->taskTypes->type . '</span><b>' 
                    : ($data->task_type === TaskType::TASK_MAJOR
                        ? '<b><span class="text-warning">' . $data->taskTypes->type . '</span><b>'
                        : '<b><span class="text-danger">' . $data->taskTypes->type . '</span><b>');
                    
                }, 
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->task_status ? '<span class="text-success">Активная</span>' : '<span class="text-danger">Не активная</span>';
                }, 
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
