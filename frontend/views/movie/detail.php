<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\RankingWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="<?= (strpos($model->cover, 'uploads') !== false) ? Yii::$app->params['adminhost'].$model->cover : Yii::$app->params['cdnHost'].$model->cover ?>" alt="">
<!--                    <div class="movie-btn">-->
                        <!--<div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                            <div><a href="https://movie.douban.com/trailer/254820/" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                        <div class="btn-transform transform-vertical">
                            <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Buy ticket</a></div>
                            <div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                        </div>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd"><?= $model->name?>&nbsp;<small><?= $model->ename?><span> <?= $model->year?></span></small></h1>
                    <div class="social-btn">
                        <a href="#" class="parent-btn"><i class="ion-heart"></i> 收藏</a>
                        <a style="color: greenyellow" href="https://movie.douban.com/subject/<?= $model->douban_id ?>/" class="parent-btn" target="_blank"><i class="ion-forward" style="border-color: greenyellow"></i> 豆瓣</a>
                        <div class="hover-bnt">
                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>分享</a>
                            <div class="hvr-item">
                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p><span>8.1</span> /10<br>
                                <span class="rv"><?= $model->count ?> 条评论</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>为音乐打分:  </p>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star-outline"></i>
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">总览</a></li>
                                <li><a href="#episodes"> 曲目信息</a></li>
                                <li><a href="#master">  音乐作者</a></li>
<!--                                <li><a href="#media"> Media</a></li>-->
<!--                                <li><a href="#moviesrelated"> Related Movies</a></li>-->
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p><?= strip_tags($model->music_desc) ?></p>

                                            <div class="title-hd-sm">
                                                <h4>剧情简介</h4>
                                            </div>
                                            <div class="mvcast-item">
                                                <p><?= strip_tags($model->desc) ?></p>
                                            </div>
                                            <div class="title-hd-sm tab-links-2">
                                                <h4>音乐节选</h4>
                                                <a href="#episodes" id="moreEpisodes" class="time">全部音乐<i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                <?php
                                                if($model->episodes):
                                                foreach ($model->episodes as $k => $v):
                                                    if($k < 5): ?>
                                                    <div class="cast-it" style="margin-bottom: 20px">
                                                        <div class="cast-left">
<!--                                                            <img src="images/uploads/cast1.jpg" alt="">-->
                                                            <p><?= $v->name ?></p>
                                                        </div>
                                                        <p><?= $v->musicians ?></p>
                                                    </div>
                                                <?php
                                                    endif;
                                                    endforeach;
                                                endif;?>
                                            </div>
                                            <div class="title-hd-sm tab-links-3">
                                                <h4>音乐作者</h4>
                                                <a href="#master" class="time">全部音乐人员<i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <p><?= $model->director ?></p>
                                                    </div>
                                                    <p>...  导演</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <?= $model->master ?>
                                                    </div>
                                                    <p>...  作曲</p>
                                                </div>
                                                <?php
                                                if($model->supervisor):?>
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <?= $model->supervisor ?>
                                                    </div>
                                                    <p>...  音乐总监</p>
                                                </div>
                                                <?php
                                                endif;?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>作曲: </h6>
                                                <p><?= $model->master ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>导演: </h6>
                                                <p><?= $model->director ?></p>
                                            </div>
                                            <?php
                                            if($model->supervisor):?>
                                                <div class="sb-it">
                                                    <h6>音乐总监: </h6>
                                                    <p><?= $model->supervisor ?></p>
                                                </div>
                                            <?php
                                            endif;?>

                                            <div class="sb-it">
                                                <h6>类型:</h6>
                                                <p><?= $model->type ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>语言:</h6>
                                                <p><?= $model->language ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>地区:</h6>
                                                <p><?= $model->area ?></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>发行:</h6>
                                                <p><?= $model->year?> 年</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>时长:</h6>
                                                <p><?= $model->duration ?> 分钟</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>浏览:</h6>
                                                <p><?= $model->count ?> 次</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>音乐标签:</h6>
                                                <p class="tags">
                                                    <span class="time"><a href="#">电子</a></span>
                                                    <span class="time"><a href="#">摇滚</a></span>
                                                    <span class="time"><a href="#">动漫</a></span>
                                                    <span class="time"><a href="#">流行</a></span>
                                                    <span class="time"><a href="#">古典</a></span>
                                                </p>
                                            </div>
                                            <div class="ads">
                                                <img src="images/uploads/ads1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="episodes" class="tab review">
                                    <div class="row">
                                        <div class="topbar-filter">
                                            <p>总共 <span><?= count($model->episodes)?> 条</span> 音乐片段</p>
                                            <label>筛选:</label>
                                            <select>
                                                <option value="popularity">受欢迎</option>
                                                <option value="popularity">时间</option>
                                                <option value="rating">评价</option>
                                            </select>
                                        </div>
                                        <div class="mvcast-item">
                                            <?php
                                            if($model->episodes):
                                                foreach ($model->episodes as $k => $v):?>

                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <h4><?= ($k+1)?></h4>
                                                            <span style="color: #abb7c4;margin-right: 20px;"><?= $v->min.":".$v->sec ?></span>
                                                            <a><?= $v->name ?>&nbsp;<?= $v->ename ?></a>
                                                        </div>
                                                        <p><?= $v->musicians ?></p>
                                                    </div>

                                                <?php
                                                endforeach;
                                            endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div id="master" class="tab">
                                    <div class="row">
                                        <div class="title-hd-sm">
                                            <h4>导演</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JW</h4>
                                                    <p><?= $model->director ?></p>
                                                </div>
                                                <p>...  导演</p>
                                            </div>
                                        </div>

                                        <div class="title-hd-sm">
                                            <h4>作曲</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JW</h4>
                                                   <?= $model->master ?>
                                                </div>
                                                <p>...  作曲</p>
                                            </div>
                                        </div>

                                        <?php
                                        if($model->supervisor):?>
                                        <div class="title-hd-sm">
                                            <h4>音乐总监</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JW</h4>
                                                    <?= $model->supervisor ?>
                                                </div>
                                                <p>...  音乐总监</p>
                                            </div>
                                        </div>
                                        <?php
                                        endif;?>


                                        <!-- //== -->
                                        <!--<div class="title-hd-sm">
                                            <h4>演奏</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>SL</h4>
                                                    <a href="#">Stan Lee</a>
                                                </div>
                                                <p>...  (based on Marvel comics)</p>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>