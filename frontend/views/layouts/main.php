<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?= Html::csrfMetaTags() ?>
    <meta name="keywords" content="电影原声,皎然影音乐,原声,原声带,OST,电影音乐,Soundtrack,原声下载,原声音乐下载">
    <meta name="Description" content="皎然影音乐，专注于电影原声音乐分享与下载">
    <title>皎然影音乐 - 专注于电影原声音乐分享与下载</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img alt="Brand" src="/static/images/logo.png"></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?= (Yii::$app->request->getUrl() == '/' || Yii::$app->request->getUrl() == '') ? 'active':''?>"><a href="/">首页 <span class="sr-only">(current)</span></a></li>
                <li class="<?= (Yii::$app->request->getUrl() == '/movie') ? 'active':''?>"><a href="/movie">电影</a></li>
                <li class="<?= (Yii::$app->request->getUrl() == '/about') ? 'active':''?>"><a href="/about">关于</a></li>
            </ul>
            <form class="navbar-form navbar-left" action="<?= Url::to(['movie/index'])?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="电影名、音乐人" name="MovieSearch[name]">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
<!--                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>-->
<!--                    <span class="input-group-btn">-->
<!--                            <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span></button>-->
<!--                    </span>-->
                </div>

            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:void(0)">游客</a></li>
<!--                <li class="dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li role="separator" class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="" href="/" > <img alt="Brand" style="height: 55px;" src="/static/images/logo.png"> </a>-->
<!--        </div>-->
<!--        <div class="collapse navbar-collapse" id="navbar">-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--                <li><a data-toggle="modal" data-target="#searchModal">搜索</a></li>-->
<!--                <li><a href="/about">关于</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<?= $content ?>

<!--<div class="footer" id="footer">-->
<!--    <a href="javascript:void(0);" id="toTop" style="display: block;"></a>-->
<!--    <div class="container">-->
<!--        <span class="footer-logo"></span>-->
<!--        <p class="law-info">-->
<!--            Copyright © 2016.Company name All rights reserved.More-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->

<footer class="container text-center footer" id="footer">
    <div>
    </div>

    <div>本站所有信息均由互联网爬虫自动搜索得来，相关链接已注明来源，版权归原创者所有。</div>
    <div>如果无意中侵犯了您的权益，请通知我们（<a href="mailto:920495391@qq.com" target="_blank">920495391@qq.com</a>)，我们会及时做相应处理，谢谢合作。</div>
    <div>音乐网官方QQ群： 131399457</div>
    <div><a href="/" target="_blank">© 2019 jiaoran.net</a> <a href="https://www.cnzz.com/stat/website.php?web_id=" target="_blank" title="站长统计">站长统计</a></div>
</footer>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <form action="<?= Url::to(['movie/index'])?>" method="get">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">搜索</h4>
            </div>
            <div class="modal-body">
                <input class="form-control input-lg" type="text" placeholder="支持电影中英文名称搜索" name="MovieSearch[name]">
                <!--<input id="bdcsMain" class="form-control input-lg" type="text" placeholder="支持电影中英文名称搜索">-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <a type="button" class="btn btn-danger disabled" target="_blank" style="width:100px"><i class="glyphicon glyphicon-search" style="margin-right:5px"></i>搜索</a>
            </div>
        </div>
        </form>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
