<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

?>

<!--.row-->
<div class="row">
    <div class="large-12">
        <h1>Кабинет</h1>
    </div>
</div>
<!--/.row-->

<!--.row-->
<div class="row">
    <div class="large-3 columns box-shadow bg-nav">
        <?
            include '_menu.php';
        ?>
    </div>

    <div class="large-8 columns">
        <div class="row">
            <div class="large-12">
                <div class="row title-balance"><div class="large-12 column"><b>Баланс <?=$userInfo['balance']?> руб.</b></div></div>
                <div class="row info-user">
                    <div class="large-12 column">
                        <p><?=$userInfo['name']?></p>
                        <p><?=$userInfo['login']?></p>
                        <!--<p>8 909 697-55-33</p>-->
                    </div>
                </div>
                <form method="POST">
                    <div class="row">
                        <?if(Yii::app()->user->hasFlash('user_password_change_message')){ ?>
                            <div class="flash-success" style="color:red;">
                                <?php echo Yii::app()->user->getFlash('user_password_change_message'); ?>
                            </div>
                        <?}?>

                            <input type="hidden" name="action_user" value="password_change" />
                            <div class="large-6 column">
                                <label>Новый пароль</label>
                                <input type="password" name="password" value="" />
                            </div>
                            <div class="large-6 column">
                                <label>Повторите пароль</label>
                                <input type="password" name="password_repeat" value="" />
                            </div>

                    </div>
                    <div class="row"><div class="large-12 column but-save"><button>Сохранить</button></div></div>
                </form>
                <div class="row title-payment">
                    <div class="large-12 column"><b>Оплата</b></div>
                </div>
                <div class="row">
                    <?if(Yii::app()->user->hasFlash('user_add_balanse_message')){ ?>
                        <div class="flash-success" style="color:red;">
                            <?php echo Yii::app()->user->getFlash('user_add_balanse_message'); ?>
                        </div>
                    <?}?>
                    <form method="POST">
                        <input type="hidden" name="action_user" value="add_balanse" />
                        <div class="large-2 column payment-price">
                            <input type="text" name="price" value="100">
                        </div>
                        <div class="large-2 column payment-rub"><label>руб.<label></div>
                        <div class="large-8 column">
                            <button>Пополнить баланс</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<!--/.row-->