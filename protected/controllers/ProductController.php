<?php

class ProductController extends Controller
{
    public function actionIndex($id){
        $model = Product::model()->findByPk($id);
        $this->render('index', array('model'=>$model));

    }
}
