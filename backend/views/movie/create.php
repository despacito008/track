<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = '新增电影';
?>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus"><?= $this->title ?></span>
    </div>
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
