<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->task_name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a(Yii::t('app', 'Вернуться'), ['/site/index'] , ['class' => 'btn btn-info']) ?></p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'task_id',
            'task_name',
            'task_description:ntext',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->taskTypes->type; 
                },
            ],
            'task_start',
            'task_end',
            [
                'attribute' => 'Task Status',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->task_status ? '<span class="text-success">Активная</span>' : '<span class="text-danger">Не активная</span>';
                }, 
            ],
            'task_created_at',
            'task_updated_at',
        ],
    ]) ?>

</div>
