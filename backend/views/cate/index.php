<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章分类列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <?= Html::a('<i class="fa fa-plus"></i> 新建分类', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
                    'layout' => '{items}',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
                        'name',
//                        'desc:ntext',
                        'position',
                        ['attribute' =>'create_time',
                            'format' =>['date', 'php:Y-m-d H:i:s']
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    window.onload = function(){
        $(function () {
            $('#example').DataTable({
                "iDisplayLength" : 20,
                "order": [[ 0, "desc" ]]
            })
        })
    }
</script>