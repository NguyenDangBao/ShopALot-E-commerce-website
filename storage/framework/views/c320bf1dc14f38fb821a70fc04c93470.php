

<?php $__env->startSection('title','Register'); ?>

<?php $__env->startSection('body'); ?>
    <!--    Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    Breadcrumb Section End-->

    <!--    login section begin-->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>

                        <?php if(session('notification')): ?>
                            <div class ='alert alert-warning' role='alert'>
                                <?php echo e(session('notification')); ?>

                            </div>
                        <?php endif; ?>


                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <form>
                                <div class="group-input">
                                    <label for="name">Name *</label>
                                    <input type="text" id="name" name="name">
                                </div>
                                <div class="group-input">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name="email">
                                </div>

                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input type="password" id="pass" name="password">
                                </div>
                                <div class="group-input">
                                    <label for="con-pass">Confirm Password *</label>
                                    <input type="password" id="con-pass" name='password_confirmation'>
                                </div>


                                <button type="submit" class="site-btn register-btn">REGISTER</button>
                            </form>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    login section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/account/register.blade.php ENDPATH**/ ?>