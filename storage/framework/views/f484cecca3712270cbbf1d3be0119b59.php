


<?php $__env->startSection('title', 'Result'); ?>

<?php $__env->startSection('body'); ?>

<!--    section begin-->
<section class="checkout-section spad">
    <div class="container">
        <div class="row">
                    <div class="col-lg-12">
                        <h4><?php echo e($notification); ?></h4>

                        <a href="./" class="primary-btn mt-5">Continue shopping</a>
                    </div>
            </div>

    </div>
</section>
    <!--    section End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/checkout/result.blade.php ENDPATH**/ ?>