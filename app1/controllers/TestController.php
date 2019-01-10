<?php
namespace app1\controllers;

use app1\models\Xyz;

class TestController
{
    public function actionA()
    {
        $a = new Xyz();
    }
    public function actionServer()
    {
        echo json_encode($_SERVER);
    }
    public function actionQuery()
    {
        echo json_encode($_GET);
    }
}