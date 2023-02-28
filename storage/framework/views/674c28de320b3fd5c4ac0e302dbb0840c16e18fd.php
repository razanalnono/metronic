<?php if (isset($component)) { $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a = $component; } ?>
<?php $component = App\View\Components\FrontLayout::resolve(['title' => 'Cart'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        
                        <li><a href="<?php echo e(route('add.product')); ?>">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="d-flex" style="position:absolute; right:110px; top:30px;">
            <p class=" btn btn-border-outline ml-5"><a href="<?php echo e(route('checkout')); ?>"> Shop Now</a></p>
        </div>
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="">Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                <?php $__currentLoopData = $cart->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Cart Single List list -->
                <div class="cart-single-list" id="<?php echo e($item->id); ?>">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="<?php echo e(route('products.show', $item->product->id)); ?>">
                                <img src="<?php echo e(($item->product->image)); ?>" alt="Product Image">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="<?php echo e(route('products.show', $item->product->slug)); ?>">
                                    <?php echo e($item->product->name); ?></a></h5>
                            <p class="product-des">
                                <span><em>Category:</em> <?php echo e($item->product->category->name); ?></span>
                                
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <input class="form-control item-quantity" data-id="<?php echo e($item->id); ?>"
                                    value="<?php echo e($item->quantity); ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="text-center"><?php echo e($item->option->variation->price * $item->quantity); ?></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            00
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" data-id="<?php echo e($item->id); ?>" href="javascript:void(0)"><i
                                    class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single List list -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->


    <?php $__env->startPush('scripts'); ?>
    <script>
        const csrf_token = "<?php echo e(csrf_token()); ?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/cart.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a)): ?>
<?php $component = $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a; ?>
<?php unset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a); ?>
<?php endif; ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/Front/index.blade.php ENDPATH**/ ?>