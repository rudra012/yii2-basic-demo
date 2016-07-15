<?php
/**
 * Created by PhpStorm.
 * User: Shailesh Rudra
 * Date: 15/7/16
 * Time: 12:49 PM
 */

namespace app\controllers;

use app\models\Country;
use yii\data\Pagination;
use yii\web\Controller;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}

?>

