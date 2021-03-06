<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Master */

$this->title = '查看艺术家';
$this->params['breadcrumbs'][] = ['label' => '艺术家列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'ename',
                        'type',
                        'sex',
                        'pic',
                        'birthday',
                        'city_id',
                        'desc:ntext',
                        'douban_id',
                        'user_id',
                        'create_time:datetime',
                        'update_time:datetime',
                    ],
                ]) ?>

            </div>
            </div>
        </div>
    </div>
</section>
