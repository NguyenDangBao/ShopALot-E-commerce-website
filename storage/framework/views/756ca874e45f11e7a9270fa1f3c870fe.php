
<div class="product-item item <?php echo e($product->tag); ?>">
    <div class="pi-pic">
        <img src="front/img/products/<?php echo e($product->productImages[0]->path); ?>" alt="">
        <?php if($product->discount !=null): ?>
            <div class="sale">Sale</div>
        <?php endif; ?>
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href="javascript:addCart(<?php echo e($product ->id); ?>) "><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="shop/product/<?php echo e($product ->id); ?>">+ Quick  View</a></li>
            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name"><?php echo e($product->tag); ?></div>
        <a href="shop/product/<?php echo e($product ->id); ?>">
            <h5><?php echo e($product->name); ?></h5>
        </a>
        <div class="product-price">
            <?php if($product->discount != null): ?>
                $<?php echo e($product->discount); ?>

                <span>$<?php echo e($product->price); ?></span>
            <?php else: ?>
                $<?php echo e($product->price); ?>

            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH D:\Project\shopalot_eshop\resources\views/front/components/product-item.blade.php ENDPATH**/ ?>