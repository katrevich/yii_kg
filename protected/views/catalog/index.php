<?php

    foreach ($categories as $cat) {
        $products = Product::model()->three()->findAll('category_id = :cat_id', array(':cat_id' => $cat->id));
        $this->renderPartial('_category', array('category'=>$cat, 'products'=>$products));
    }

    $products = Product::model()->three()->findAll('category_id = -1');
    $this->renderPartial('_category', array('products'=>$products));

?>

