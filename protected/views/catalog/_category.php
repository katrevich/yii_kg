<h1><?php echo isset($category) ? $category->name : 'Без категории'; ?></h1>
<section class="products-list">
    <ul>
        <?php foreach ($products as $product):?>
        <li>
            <div class="item-title"><a href="<?php echo $this->createUrl('product/index', array('id'=>$product->id));?>"><?php echo $product->title;?></a></div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>