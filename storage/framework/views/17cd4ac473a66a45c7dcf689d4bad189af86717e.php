<?php if (isset($component)) { $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a = $component; } ?>
<?php $component = App\View\Components\FrontLayout::resolve(['title' => 'Checkout'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    


                            <form method="post" action="<?php echo e(route('checkout')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class=" col-lg-12">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Checkout</h5>

                                        </div>
                                        <div class="modal-body row col-lg-12">

                                            <div class="form-group col-md-6">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][first_name]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="addr[shipping][last_name]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="addr[shipping][email]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][phone_number]" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="street_address">Street Address</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][street_address]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="addr[shipping][city]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" name="addr[shipping][country]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="postal_code">Postal Code</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][postal_code]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" name="addr[shipping][state]"
                                                    required>
                                            </div>





                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                </div>
                <div class="col-xl-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price"><?php echo e($cart->total()); ?></p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.50</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.00</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price"><?php echo e($cart->total()); ?></p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a)): ?>
<?php $component = $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a; ?>
<?php unset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a); ?>
<?php endif; ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/Front/checkout.blade.php ENDPATH**/ ?>