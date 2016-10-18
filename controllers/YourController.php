<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use frontend\components\PaypalListener;


class MembershipsController extends Controller
{
    public function actionThankyou()
    {
        
        $listener = new PaypalListener();
        $listener->requirePostMethod();
        $verified = $listener->processIpn();
       
        if($verified) {

		} else {
			 return $this->render('sorry');
		}
        
    }

    public function actionSorry()
    {
        return $this->render('sorry');
    }

}
