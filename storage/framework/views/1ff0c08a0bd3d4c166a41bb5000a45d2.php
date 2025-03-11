<?php use App\Utilities\Constant; ?>


<?php $__env->startSection('title', 'My Order'); ?>

<?php $__env->startSection('body'); ?>
    <!---->
    <!--    Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                        <span>My-Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    Breadcrumb Section End-->

    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                OrderID:
                                <b><?php echo e($order->id); ?></b>
                            </a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name</label>
                                <input disabled type="text" id="fir" value="<?php echo e($order->first_name); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input disabled type="text" id="last" value="<?php echo e($order->last_name); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input disabled type="text" id="cun-name" value="<?php echo e($order->company_name); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country</label>
                                <input disabled type="text" id="cun" value="<?php echo e($order->country); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address</label>
                                <input disabled type="text" id="street" class="street-first"
                                       value="<?php echo e($order->street_address); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP(optional)</label>
                                <input disabled type="text" id="text" value="<?php echo e($order->postcode_zip); ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City</label>
                                <input disabled type="text" id="town" value="<?php echo e($order->town_city); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="fir">Company Name</label>
                                <input disabled type="text" id="text" value="<?php echo e($order->email); ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for='phone'>Phone</label>
                                <input disabled type="text" id="phone" value="<?php echo e($order->phone); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Status:
                                <b><?php echo e(Constant::$order_Status[$order->status]); ?></b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="fw-normal">
                                            <?php echo e($orderDetail->product->name); ?> x <?php echo e($orderDetail->qty); ?>

                                            <span>$<?php echo e($orderDetail->total); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="total-price">
                                        Total
                                        <span>$<?php echo e(array_sum(array_column($order->orderDetails->toArray(),'total'))); ?></span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            COD
                                            <input disabled type="radio" name="payment_type" value="pay_later"
                                                   id="pc-check" <?php echo e($order->payment_type == 'pay_later' ? 'checked' : ''); ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input disabled type="radio" name="payment_type" value="online_payment"
                                                   id="pc-paypal" <?php echo e($order->payment_type == 'online_payment' ? 'checked' : ''); ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/account/my-order/show.blade.php ENDPATH**/ ?>