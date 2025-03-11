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
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead style="table-layout: fixed;">
                            <tr>
                                <th style="width: 20%;">IMAGE</th>
                                <th style="width: 15%;">ID</th>
                                <th style="width: 20%; text-align: left;">PRODUCTS</th>
                                <th style="width: 15%;">TOTAL</th>
                                <th style="width: 20%;">DETAILS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="cart-pic first-row"><img style="height:200px;" src="front/img/products/<?php echo e($order->orderDetails[0]->product->productImages[0]->path); ?>"
                                                                        alt="">
                                    </td>
                                    <td class="first-row">#<?php echo e($order->id); ?></td>
                                    <td class="cart-title first-row">
                                        <h5>
                                            <?php echo e($order->orderDetails[0]->product->name); ?>


                                            <?php if(count($order->orderDetails) > 1): ?>
                                                (and <?php echo e(count($order->orderDetails)); ?> other products)
                                            <?php endif; ?>

                                        </h5>
                                    </td>
                                    <td class="total-price first-row">
                                        $<?php echo e(array_sum(array_column($order->orderDetails->toArray(), 'total'))); ?>

                                    </td>
                                    <td class="first-row">
                                        <a class="btn" href="./account/my-order/<?php echo e($order->id); ?>">Details</a>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/account/my-order/index.blade.php ENDPATH**/ ?>