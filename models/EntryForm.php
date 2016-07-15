<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Rudra
 * Date: 15/7/16
 * Time: 12:06 PM
 */
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}
