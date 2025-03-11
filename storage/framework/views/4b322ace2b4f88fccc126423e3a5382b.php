
<?php $__env->startSection("title","Home"); ?>
<?php $__env->startSection("body"); ?>
<!--Hero Section Begin-->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.Jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,Kids</span>
                        <h1>Black friday</h1>
                        <p>Stores offer big discounts and sales to start the Christmas shopping season. Many stores open early, sometimes as early as midnight or even on Thanksgiving.</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale<span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.Jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,Kids</span>
                        <h1>Black friday</h1>
                        <p>Stores offer big discounts and sales to start the Christmas shopping season. Many stores open early, sometimes as early as midnight or even on Thanksgiving.</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale<span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Hero Section End-->

<!--banner Section Begin-->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-1.jpg" alt="">
                    <div class="inner-text">
                        <h4>Men's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-2.jpg" alt="">
                    <div class="inner-text">
                        <h4>Women's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-3.jpg" alt="">
                    <div class="inner-text">
                        <h4>Kid's</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner Section End-->

<!--Women banner Section Begin-->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                    <h2>Women's</h2>
                    <a href="#">Discover More</a>
                </div>

            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="women">All</li>
                        <li class="item" data-tag=".Clothing" data-category="women">Clothing</li>
                        <li class="item" data-tag=".HandBag" data-category="women">HandBag</li>
                        <li class="item" data-tag=".Shoes" data-category="women">Shoes</li>
                        <li class="item" data-tag=".Accessories" data-category="women">Accessories</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel women">
                    <?php $__currentLoopData = $featuredProducts['women']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Women banner Section End-->

<!--Deal of the week Section Begin-->
<section class="deal-of-week set-bg spad"  data-setbg="front/img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>A new unique deal every Friday. Only while stocks last. It pays to be quick.</p>
                <div class="product-price">
                    $35.00
                    <span>/HandBag</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>34</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>45</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>25</span>
                    <p>Secs</p>
                </div>
            </div>
            <a  href="/shop" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>
<!--Deal of the week Section End-->

<!--Man Banner Section Begin-->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="men">All</li>
                        <li class="item" data-tag=".Clothing" data-category="men">Clothing</li>
                        <li class="item" data-tag=".HandBag" data-category="men">HandBag</li>
                        <li class="item" data-tag=".Shoes" data-category="men">Shoes</li>
                        <li class="item" data-tag=".Accessories" data-category="men">Accessories</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel men">
                    <?php $__currentLoopData = $featuredProducts['men']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>



            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
                    <h2>Men's</h2>
                    <a href="#">Discover More</a>
                </div>
            </div>
            </div>
        </div>
</section>
<!--Man Banner Section End-->

<!--Instagram Section begin-->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram">
                <h5>
                    <a href="#">ShopALot_Collection</a>
                </h5>
            </i>
        </div>
    </div>
</div>
<!--Instagram Section End-->

<!--latest Blog Section Begin-->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="front/img/blog/<?php echo e($blog->image); ?>" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar"></i>
                                <?php echo e(date('M d, Y', strtotime($blog->created_at))); ?>

                            </div>
                            <div class="tag-item">
                                <i class="fa fa-calendar"></i>
                               <?php echo e(count($blog->blogComments)); ?>

                            </div>
                        </div>
                        <a href="#">
                            <h4><?php echo e($blog->title); ?></h4>
                        </a>
                        <p><?php echo e($blog -> subtitle); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over $99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On  Time</h6>
                            <p>If Goods Have no Problem</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-3.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure Payment</p>
                        </div>
                    </div>
                </div>

            </div>
            </div>

    </div>

</section>
<!--latest Blog Section End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make("front.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/index.blade.php ENDPATH**/ ?>