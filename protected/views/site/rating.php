<?php
/* @var $this SiteController */

$this->pageTitle="Рейтинг";
?>

<div class="row">
    <div class="large-12">
        <h1>Рейтинг компаний</h1>
    </div>
</div>
<div class="row">
    <div class="large-5">
        <ol>
            <?
                if($items)foreach($items as $key=>$item){
            ?>
                    <li><?echo $item['name']?></li>
            <?
                }
            ?>
            <!--<li>Future</li>
            <li>Agima</li>
            <li>Notemedia</li>
            <li>Шарашкина контора</li>
            <li>Никита и друзья</li>
            <li>ПироговTime</li>
            <li>Future</li>
            <li>Future</li>
            <li>Future</li>
            <li>Future</li>
            <li>Future</li>-->
        </ol>
    </div>
</div>