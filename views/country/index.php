<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Rudra
 * Date: 15/7/16
 * Time: 1:08 PM
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Countries</h1>
<ul>
<?php foreach ($countries as $country): ?>
    <li>
        <?= Html::encode("{$country->name} ({$country->code})") ?>:
        <?= $country->population ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>