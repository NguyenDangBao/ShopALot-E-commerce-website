<form action='<?php echo e(request()->segment(2)=='product' ? 'shop' : ''); ?>'>

    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul  class="filter-catagories">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="shop/category/<?php echo e($category->name); ?>"><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">

            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bc-item">
                    <label for="bc-<?php echo e($brand->id); ?>">
                        <?php echo e($brand->name); ?>

                        <input type="checkbox"
                               <?php echo e((request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : ''); ?>

                               id="bc-<?php echo e($brand->id); ?>" name="brand[<?php echo e($brand->id); ?>]"
                               onchange="this.form.submit();">
                        <span class="checkmark"></span>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">

                </div>
            </div>
            <div class="price-range  ui-slider ui-corner-all  ui-slider-horizontal  ui-widget ui-widget-content"
                 data-min="10" data-max="999"
                 data-min-value="<?php echo e(str_replace('$', '', request('price_min'))); ?>"
                 data-max-value="<?php echo e(str_replace('$', '', request('price_max'))); ?>">
                <div class="ui-slider-range ui-corner-all ui-widget-header"> </div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>


        <button type="submit" class="filter-btn">Filter</button>

    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'black' ? 'checked' :''); ?>>
                <label class="cs-black <?php echo e(request('color') == 'black' ? 'font-weight-bold' : ''); ?>" for="cs-black" >black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'violet' ? 'checked' :''); ?>>
                <label class="cs-violet <?php echo e(request('color') == 'violet' ? 'font-weight-bold' : ''); ?>" for="cs-violet" >violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'blue' ? 'checked' :''); ?>>
                <label class="cs-blue <?php echo e(request('color') == 'blue' ? 'font-weight-bold' : ''); ?>" for="cs-blue" >blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'yellow' ? 'checked' :''); ?>>
                <label class="cs-yellow <?php echo e(request('color') == 'yellow' ? 'font-weight-bold' : ''); ?>" for="cs-yellow" >yellow</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'red' ? 'checked' :''); ?>>
                <label class="cs-red <?php echo e(request('color') == 'red' ? 'font-weight-bold' : ''); ?>" for="cs-red" >red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();"
                    <?php echo e(request('color') == 'green' ? 'checked' :''); ?>>
                <label class="cs-green <?php echo e(request('color') == 'green' ? 'font-weight-bold' : ''); ?>" for="cs-green" >green</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="s" onchange="this.form.submit();"
                    <?php echo e(request('size') == 's' ? 'checked' : ''); ?>>
                <label for="s-size" class="<?php echo e(request('size') =='s' ? 'active' : ''); ?>">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size" name="size" value="m" onchange="this.form.submit();"
                    <?php echo e(request('size') == 'm' ? 'checked' : ''); ?>>
                <label for="n-size" class="<?php echo e(request('size') =='m' ? 'active' : ''); ?>">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size" name="size" value="l" onchange="this.form.submit();"
                    <?php echo e(request('size') == 'l' ? 'checked' : ''); ?>>
                <label for="l-size" class="<?php echo e(request('size') =='l' ? 'active' : ''); ?>">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size" name="size" value="xs" onchange="this.form.submit();"
                    <?php echo e(request('size') == 'xs' ? 'checked' : ''); ?>>
                <label for="xs-size" class="<?php echo e(request('size') =='xs' ? 'active' : ''); ?>">xs</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4  class="fw-tags">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">trousers</a>
            <a href="#">Men's hat</a>
            <a href="#">Backpack</a>
        </div>
    </div>
</form>
<?php /**PATH D:\Project\shopalot_eshop\resources\views/front/shop/components/products-sidebar-filter.blade.php ENDPATH**/ ?>