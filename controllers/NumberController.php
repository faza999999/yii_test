<?php
namespace app\controllers;

use yii\rest\Controller;
use app\models\Number;
use yii\web\NotFoundHttpException;

class NumberController extends Controller
{
    public function actionGet($id)
    {
        if (($number = Number ::findOne($id)) !== null) {
            return [
                'rand_number' => $number->number
            ];
        } else {
            throw new NotFoundHttpException('Number with id '.$id.' is not exist');
        }

    }

    public function actionGen()
    {
        $number = new Number();
        $rand_number = rand(0, 99999);
        $number->number = $rand_number;
        $number->save();
        return [
            'id' => $number->id,
            'number' => $rand_number,
        ];
    }

    protected function verbs()
    {
        return [
            'get' => ['GET'],
            'gen' => ['POST'],
        ];
    }
}