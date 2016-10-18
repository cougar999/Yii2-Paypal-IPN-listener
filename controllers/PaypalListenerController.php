<?php

namespace frontend\controllers;

use Yii;

use frontend\components\PaypalListener;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;

class PaypalListenerController extends Controller {

    public function actionThankyou ()
    {
        
        $listener = new PaypalListener();
        $listener->requirePostMethod();
        $verified = $listener->processIpn();

        if ($verified) {
				//do something here

                return $this->render('paid', [
                    'model' => $model,
                ]);
          
        } else {
            return $this->render('sorry');
        }
    }

}
?>