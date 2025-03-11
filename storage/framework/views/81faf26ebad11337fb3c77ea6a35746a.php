

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('body'); ?>
    <!---->
    <!--    Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./index.html"><i class="fa fa-home"></i>Home</a>
                        <span>Login</span>
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
                    <div class="login-form">
                        <h2>Login</h2>

                        <?php if(session('notification')): ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo e(session('notification')); ?>


                            </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <form>
                                <div class="group-input">
                                    <label for="username">Email address *</label>
                                    <input type="email" id="email" name="email">
                                </div>

                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input type="password" id="pass" name="password">
                                </div>

                                <div class="group-input gi-check">
                                    <div class="gi-more">
                                        <label for="save-pass">
                                            Save Password
                                            <input type="checkbox" id="save-pass" name="remember">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="#" class="forget-pass">Forget your Password</a>
                                    </div>
                                </div>

                                <button type="submit" class="site-btn login-btn">Sign In</button>
                            </form>
                        </form>
                        <div class="switch-login">
                            <a href="./account/register" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    login section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\shopalot_eshop\resources\views/front/account/login.blade.php ENDPATH**/ ?>