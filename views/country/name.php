<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Rudra
 * Date: 15/7/16
 * Time: 6:33 PM
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<div class="name">
    <h2><?= Html::encode($model->name) ?></h2>
    <?= HtmlPurifier::process($model->code) ?>
    <br>
    <?= HtmlPurifier::process($model->population) ?>

</div>
