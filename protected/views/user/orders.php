<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

?>

<!--.row-->
<div class="row">
    <div class="large-12">
        <h1>Заказы</h1>
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


    <? if($items){?>
    <div class="large-8 columns box-shadow">
        <?foreach($items as $item){?>
            <div class="row">
                <div class="large-12 columns item">
                    <div class="datatime"><?=date('d.m.Y',$item['date_create'])?></div>
                    <div class="h2">Заказ <?=$item['id_order']?></div>
                    <p><?=$item['description']?></p>
                    <div class="cart-price parent">
                        <a href="?order_buy=<?=$item['id_order']?>">
                            <button class="right">Купить</button>
                        </a>
                        <div class="price left"><b>Цена: 15 рублей Ставок: <?=$item['count_buy']?></b></div>
                    </div>
                    <hr>
                </div>
            </div>
        <?}?>
        <? if($pages_order['count']>1){?>
            <div class="pagination">
                <?for($page = 1;$page<=$pages_order['count'];$page++){?>
                    <div class="page" style="float:left;padding-right: 5px;"><a href="?page=<?=$page?>"><?=$page?></a></div>
                <?}?>
            </div>
        <?}?>
    </div>
    <?} else {?>
        <div class="large-8 columns">
            Нет ниодного заказа.
        </div>
    <?}?>

</div>
<!--/.row-->