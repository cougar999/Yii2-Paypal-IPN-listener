# Yii2-Paypal-listener

A PayPal IPN (Instant Payment Notification) listener for Yii2. From https://github.com/Quixotix/PHP-PayPal-IPN/

Usage
-------------

####1. Copy file to your project folder. root for basic, Frontend for advanced.

####2. Add code into your main.php or main-local.php file.
    <?php
    'authManager' => [
        'class' => 'yii\rbac\DbManager'
    ],
    'payPalListener' => [
        'class' => 'frontend/components/PaypalListener', 
      ],
    ?>          
          
          
####3. Add code in your Controller

    <?php

    namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    use yii\helpers\Url;
    use frontend\components\PaypalListener;


    class YourController extends Controller
    {
        public function actionThankyou()
        {
            
            $listener = new PaypalListener();
            $listener->requirePostMethod();
            $verified = $listener->processIpn();
       
            if($verified) {
              //do something here
            } else {
              return $this->render('sorry');
            }
        
        }
    }
    ?>

