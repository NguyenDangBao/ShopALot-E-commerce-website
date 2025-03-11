

<?php $__env->startSection('title', 'Shop'); ?>

<?php $__env->startSection('body'); ?>

<!--    Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    Breadcrumb Section End-->

<!--    Product Shop Section Begin-->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

                    <?php echo $__env->make('front.shop.components.products-sidebar-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                <div class="select-option">
                                    <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                        <option <?php echo e(request('sort_by') == 'latest' ? 'selected' : ''); ?> value="latest">Sorting: Latest</option>
                                        <option <?php echo e(request('sort_by') == 'oldest' ? 'selected' : ''); ?> value="oldest">Sorting: Oldest</option>
                                        <option <?php echo e(request('sort_by') == 'name-ascending' ? 'selected' : ''); ?> value="name-ascending">Sorting: Name A-Z</option>
                                        <option <?php echo e(request('sort_by') == 'name-descending' ? 'selected' : ''); ?> value="name-descending">Sorting: Name Z-A</option>
                                        <option <?php echo e(request('sort_by') == 'price-ascending' ? 'selected' : ''); ?> value="price-ascending">Sorting: Price Ascending</option>
                                        <option <?php echo e(request('sort_by') == 'price-descending' ? 'selected' : ''); ?> value="price-descending">Sorting: Price Descending</option>
                                    </select>
                                    <select name="show" onchange="this.form.submit();" class="p-show">
                                        <option <?php echo e(request('show') == '3' ? 'selected' : ''); ?> value="3">Show: 3</option>
                                        <option <?php echo e(request('show') == '9' ? 'selected' : ''); ?> value="9">Show: 9</option>
                                        <option <?php echo e(request('sho') == '15' ? 'selected' : ''); ?> value="15">Show: 15</option>
                                    </select>
                                </div>
                                </form>
                            </div>

                            <div class="col-lg-5 col-md-5 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-sm-6">
                                    <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                   <?php echo e($products->links()); ?>

                </div>

            </div>
        </div>
    </section>
<!--    Product Shop Section End-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/shop/index.blade.php ENDPATH**/ ?>