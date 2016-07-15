<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Rudra
 * Date: 15/7/16
 * Time: 4:23 PM
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

function line_break()
{
    echo "<br>---------------------------------------------------------------------------------------------";
    echo "---------------------------------------------------------------------------------------------<br>";
}
function displayArrayRecursively($arr, $indent='') {
    if ($arr) {
        foreach ($arr as $value) {
            if (is_array($value)) {
                //
                displayArrayRecursively($value, $indent . '-');
            } else {
                //  Output
                echo "$indent $value <br>";
            }
        }
    }
}
line_break();

class User
{
    public $name = 'Rudra';
}

$array = [
    'foo' => [
        'bar' => new User(),
    ]
];

$simple_value = isset($array['foo']['bar']->name) ? $array['foo']['bar']->name : null;
$helper_value = ArrayHelper::getValue($array, 'foo.bar.name');
echo $simple_value . "<br>";
echo $helper_value . "<br>";

line_break();

$new_array = ['type' => 'Array', 'options' => [1, 2]];
$type = ArrayHelper::remove($new_array, 'type');
echo $type . "<br>";

line_break();

$data1 = [
    'userName' => 'Alex',
];

$data2 = [
//    'username' => 'Carsten',
];

if (!ArrayHelper::keyExists('username', $data1, false) || !ArrayHelper::keyExists('username', $data2, false)) {
    echo "Please provide username.<br>";
}

if(!ArrayHelper::keyExists('username', $data1, false)){
    echo "Please provide username in data1.<br>";
}

if(!ArrayHelper::keyExists('username', $data2, false)){
    echo "Please provide usernamein data2.<br>";
}

line_break();

$data = [
    ['id' => '123', 'data' => 'abc'],
    ['id' => '345', 'data' => 'def'],
];
$ids = ArrayHelper::getColumn($data, 'id');

foreach ($ids as $x => $x_val){
    echo $x_val. "<br>";
}

$result = ArrayHelper::getColumn($data, function ($element) {
    return $element['id'];
});

foreach ($result as $x => $x_val){
    echo $x_val. "<br>";
}

line_break();

$array = [
    ['id' => '123', 'data' => 'abc', 'device' => 'laptop'],
    ['id' => '345', 'data' => 'def', 'device' => 'tablet'],
    ['id' => '345', 'data' => 'hgi', 'device' => 'smartphone'],
];
$result = ArrayHelper::index($array, 'id');

//[
//    '123' => ['id' => '123', 'data' => 'abc', 'device' => 'laptop'],
//    '345' => ['id' => '345', 'data' => 'hgi', 'device' => 'smartphone']
//    // The second element of an original array is overwritten by the last element because of the same id
//]

foreach ($result as $x => $x_val) {
    echo $x . "<br>";
    foreach ($x_val as $y => $y_val) {
        echo $y, "-----", $y_val . "<br>";
    }
}

$result = ArrayHelper::index($array, function ($element) {
    return $element['id'];
});
displayArrayRecursively($result);
foreach ($result as $x => $x_val) {
    echo $x . "<br>";
    foreach ($x_val as $y => $y_val) {
        echo $y, "-----", $y_val . "<br>";
    }
}
line_break();



$result = ArrayHelper::index($array, 'data', [function ($element) {
    return $element['id'];
}, 'device']);

displayArrayRecursively($result);

line_break();

$array = [
    ['id' => '123', 'name' => 'aaa', 'class' => 'x'],
    ['id' => '124', 'name' => 'bbb', 'class' => 'x'],
    ['id' => '345', 'name' => 'ccc', 'class' => 'y'],
];

$result = ArrayHelper::map($array, 'id', 'name');
// the result is:
// [
//     '123' => 'aaa',
//     '124' => 'bbb',
//     '345' => 'ccc',
// ]
displayArrayRecursively($result);
line_break();

$result = ArrayHelper::map($array, 'id', 'name', 'class');
displayArrayRecursively($result);
// the result is:
// [
//     'x' => [
//         '123' => 'aaa',
//         '124' => 'bbb',
//     ],
//     'y' => [
//         '345' => 'ccc',
//     ],
// ]

line_break();
$data = [
    ['age' => 30, 'name' => 'Alexander'],
    ['age' => 30, 'name' => 'Brian'],
    ['age' => 19, 'name' => 'Barney'],
];
ArrayHelper::multisort($data, ['age', 'name'], [SORT_ASC, SORT_DESC]);
foreach ($data as $x => $x_val) {
    echo $x . "<br>";
    foreach ($x_val as $y => $y_val) {
        echo $y, "-----", $y_val . "<br>";
    }
}

line_break();
// no keys specified
$indexed = ['Qiang', 'Paul'];
echo ArrayHelper::isIndexed($indexed). "<br>";

// all keys are strings
$associative = ['framework' => 'Yii', 'version' => '2.0'];
echo ArrayHelper::isAssociative($associative). "<br>";


line_break();
?>

<H1><?= Html::encode($simple_value) ?></H1>
<H1><?= Html::encode($helper_value) ?></H1>
<H1><?= Html::encode($type) ?></H1>

