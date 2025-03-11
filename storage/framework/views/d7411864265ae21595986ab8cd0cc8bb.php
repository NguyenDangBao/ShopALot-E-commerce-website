


<?php $__env->startSection('title', 'Check Out'); ?>

<?php $__env->startSection('body'); ?>

<!--    Shopping cart section begin-->
<section class="checkout-section spad">
    <div class="container">
        <form action=""  method="Post" class="checkout-form">
            <?php echo csrf_field(); ?>
            <div class="row">

                <?php if(Cart::count()>0): ?>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="./account/login" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo e(Auth::user()->id ?? ''); ?>">

                            <div class="col-lg-6">
                                <label for="fir">First Name <span></span></label>
                                <input type="text" id="fir" name="first_name" value="<?php echo e(Auth::user()->name ?? ''); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">last Name <span></span></label>
                                <input type="text" id="last" name="last_name">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name<span></span></label>
                                <input type="text" id="cun-name" name="company_name" value="<?php echo e(Auth::user()->company_name ?? ''); ?>" >
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span></span></label>
                                <input type="text" id="cun" name="country" value="<?php echo e(Auth::user()->country ?? ''); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span></span></label>
                                <input type="text" id="street" name="street_address" class="street-first" value="<?php echo e(Auth::user()->street_address ?? ''); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode/ ZIP(optional) <span></span></label>
                                <input type="text" id="zip" name="postcode_zip" value="<?php echo e(Auth::user()->postcode_zip ?? ''); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City <span></span></label>
                                <input type="text" id="town" name="town_city" value="<?php echo e(Auth::user()->town_city ?? ''); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address <span></span></label>
                                <input type="text" id="email" name="email" value="<?php echo e(Auth::user()->email ?? ''); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span></span></label>
                                <input type="text" id="phone" name="phone" value="<?php echo e(Auth::user()->phone ?? ''); ?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="fw-normal"><?php echo e($cart->name); ?> x <?php echo e($cart->qty); ?> <span>$<?php echo e($cart->price * $cart->qty); ?></span></li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="fw-normal">Subtotal <span>$<?php echo e($subtotal); ?></span></li>
                                    <li class="total-price">Total <span>$<?php echo e($total); ?></span></li>
                                </ul>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            COD
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                           Online Payment
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">
                                        Place Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <h4>Your Cart is Empty.</h4>
                    </div>

                <?php endif; ?>
            </div>
        </form>
    </div>
</section>
    <!--    Shopping cart section End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/checkout/index.blade.php ENDPATH**/ ?>