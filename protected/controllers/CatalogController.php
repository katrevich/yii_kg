<?php

class CatalogController extends Controller {

    public function actionIndex($category_id = null){
        if (!isset($category_id)){
            $categories = Category::model()->findAll();
            $this->render('index', array('categories'=>$categories));
        } else {
            $category = Category::model()->findByPk($category_id);
            $this->render('category', array('category'=>$category));
        }
    }

}
