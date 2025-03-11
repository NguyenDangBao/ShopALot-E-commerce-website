
<?php $__env->startSection('title', 'Product'); ?>

<?php $__env->startSection('body'); ?>
    <!--  product shop Section Begin  -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('front.shop.components.products-sidebar-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="front/img/products/<?php echo e($product->productImages[0]->path); ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>

                                </div>

                            </div>
                            <div  class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="pt active" data-imgbigurl="front/img/products/<?php echo e($productImage->path); ?>">
                                            <img src="front/img/products/<?php echo e($productImage->path); ?>" alt="">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                <span><?php echo e($product->tag); ?></span>
                                <h3><?php echo e($product->name); ?></h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                                <div class="pd-rating">
                                    <?php for($i = 1;$i <= 5; $i++): ?>
                                        <?php if($i <= $product->avgRating): ?>
                                            <i  class="fa fa-star"></i>
                                        <?php else: ?>
                                            <i  class="fa fa-star-o"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                        <span>(<?php echo e(count($product->productComments)); ?>)</span>
                                    </div>
                                <div class="pd-desc">
                                    <p><?php echo e($product->content); ?></p>

                                    <?php if($product->discount != null): ?>
                                        <h4>$<?php echo e($product->discount); ?><span><?php echo e($product->price); ?></span></h4>
                                    <?php else: ?>
                                        <h4>$<?php echo e($product->discount); ?></h4>
                                    <?php endif; ?>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        <?php $__currentLoopData = array_unique(array_column($product->productDetails->toArray(),"color")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="cc-item">
                                            <input  type="radio" id="cc-<?php echo e($productColor); ?>">
                                            <label for="cc-<?php echo e($productColor); ?>" class="cc-<?php echo e($productColor); ?>"></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    <?php $__currentLoopData = array_unique(array_column($product->productDetails->toArray(),"size")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="sc-item">
                                    <input type="radio" id="sm-<?php echo e($productSize); ?>">
                                    <label for="sm-<?php echo e($productSize); ?>"><?php echo e($productSize); ?></label>
                                </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <div class="quantity">
                                    <div  class="quantity">
                                        <div class="pro-qty">
                                            <input text="text" value="1">
                                        </div>
                                        <a href="javascript:addCart(<?php echo e($product ->id); ?>)" class="primary-btn pd-cart">Add To Cart</a>
                                    </div>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: <?php echo e($product->productCategory->name); ?></li>

                                    <li><span>TAGS</span>:<?php echo e($product->tag); ?></li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku: <?php echo e($product->sku); ?></div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">DESCRIPTION</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATIONS</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Reviews (<?php echo e(count($product->productComments)); ?>)</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <?php echo $product->description; ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div  class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php if($i <= $product->avgRating): ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>

                                                        <span>(<?php echo e(count($product->productComments)); ?>)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$<?php echo e($product->price); ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add to Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability></td>
                                                <td>
                                                    <div class="p-stock"><?php echo e($product ->qty); ?> in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight"><?php echo e($product->weight); ?>kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        <?php $__currentLoopData = array_unique(array_column($product->productDetails->toArray(),"size")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($productSize); ?>,
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </td>
                                            </tr>







                                            </tr>
                                            <tr>
                                                <td class="p-catagory">SKu</td>
                                                <td>
                                                    <div class="p-code"><?php echo e($product->sku); ?></div>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4><?php echo e(count($product->productComments)); ?> Comments</h4>
                                        <div class="comment-option">
                                            <?php $__currentLoopData = $product->productComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img
                                                        src="front/img/user/<?php echo e($productComment->user->avatar ?? 'default-avatar.jpg'); ?>"
                                                        alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <?php if($i <= $productComment->rating): ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <h5><?php echo e($productComment->name); ?> <span><?php echo e(date('M d, Y', strtotime($productComment->created_at))); ?></span></h5>
                                                    <div class="at-reply"><?php echo e($productComment->messages); ?></div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="" method="post" class="comment-form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                <input type="hidden" name="user_id" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->id ?? null); ?>">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>

                                                        <div class="personal-rating">
                                                            <h6>Your Rating</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  product shop Section End  -->

    <!--    Related Products section start -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!--    Related Products section End -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/shop/show.blade.php ENDPATH**/ ?>