<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 7 ]>   <html class="no-js ie7" lang="ru"><![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="ru"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="no-js" lang="ru"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!--style-->
    <link rel="stylesheet" href="/css/btr/base.css">
    <link rel="stylesheet" href="/css/btr/normalize.css">
    <link rel="stylesheet" href="/css/btr/foundation.css">
    <link rel="stylesheet" href="/css/btr/main.css">

    <!--script-->
    <script src="/js/vendor/custom.modernizr.js"></script>
    <script src="/js/vendor/jquery.js"></script>

</head>
<body>
<div id="header">
    <!--.top-header-->
    <div class="top-header">
        <div class="row">
            <div class="large-12">
                <div class="large-4 column">
                    <div class="group-link">
                        <a href="javascript:void(0)">Как работает этот сайт ? </a>
                        <?if(Yii::app()->user->isGuest){?>
                            <a href="/index.php/site/login">Войти в систему </a>
                        <?}?>
                    </div>
                </div>
                <div class="large-8 columns status-user">
                    <?if(!Yii::app()->user->isGuest){
                        $User = new User();
                        ?>
                        <div class="large-1 column user-name"><a href="/index.php/site/logout">Выйти</a></div>
                        <div class="large-6 column user-name"><a href="/index.php/user"><?=$User->getName()?></a></div>
                        <div class="large-2 column balance"><span><?=$User->getBalans()?> руб.</span></div>
                        <div class="large-3 column fill_up_balance"><button onclick="window.location = '/index.php/user';return false;">Пополнить баланс</button></div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header-->
    <!--.bottom-header-->
    <div class="bottom-header">
        <div class="row">
            <div class="large-3 columns">
                <a href="javascript:void(0)" class="logo">btr</a>
            </div>
            <div class="large-9 columns">
                <nav class="top-bar">
                    <ul class="title-area">
                        <li class="name"></li>
                        <li class="toggle-topbar"><a href="javascript:void(0)">Меню</a></li>
                    </ul>
                    <section class="top-bar-section">
                        <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                array('label'=>'Главная', 'url'=>array('/site/index')),
                                array('label'=>'Рейтинг компаний', 'url'=>array('/site/rating')),
                                array('label'=>'О компании', 'url'=>array('/site/page', 'view'=>'about')),
                                array('label'=>'Контакты', 'url'=>array('/site/contact')),
                                //array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Регистрация', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest),
                                //array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                            'htmlOptions'=>array('class'=>'title-area'),
                        )); ?>
                    </section>
                </nav>
            </div>
        </div>
    </div>
    <!--/.bottom-header-->

    <div id="main">

        <?php echo $content; ?>

    </div>


    <script>
        document.write('<script src=' +
            ('__proto__' in {} ? '/js/vendor/zepto' : 'js/vendor/jquery') +
            '.js><\/script>')
    </script>

    <script src="/js/foundation.min.js"></script>

    <script>
        $(document).foundation();
    </script>
</body>
</html>
