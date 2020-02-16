<?

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="body-content">
    <div class="row">
        <?= $this->render('_searchTask', ['model' => $searchModel]); ?>

        <h2>Активные задачи</h2>

        <div class="table-responsive">
            <? Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-hover'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'Название',
                        'value' => function($data) {
                            return $data->task_name;
                        },

                    ],

                    [
                        'attribute' => 'Описание',
                        'value' => function($data) {
                            return $data->task_description;
                        },

                    ],

                    [
                        'attribute' => 'Тип задачи',
                        'value' => function($data) {
                            return $data->taskTypes->type;
                        },
                    ],

                    [
                        'attribute' => 'Дата начала',
                        'format' => ['date', 'dd/MM/yyyy'],
                        'value' => function($data) {
                            return $data->task_start;
                        },
                    ],

                    [
                        'attribute' => 'Дата окончания',
                        'format' => ['date', 'dd/MM/yyyy'],
                        'value' => function($data) {
                            return $data->task_end;
                        },
                    ],
                    
                    [
                        'attribute' => 'Действие',
                        'format' => 'raw',
                        'value' => function($data) {
                            return Html::a('Посмотреть', ['view', 'id' => $data->task_id]);
                        },
                    ],
                ],
            ]); ?>
            <? Pjax::end(); ?>
        </div>
    </div>
</div>