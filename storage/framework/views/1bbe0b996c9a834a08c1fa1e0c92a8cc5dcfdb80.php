

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock
            </h3>
        </div>

    </div>



    <div class="card card-custom gutter-b">
        <!--begin::Card Body-->
        <div class="card-body d-flex rounded bg-secondary p-12 flex-column flex-md-row flex-lg-column flex-xxl-row">
            <!--begin::Image-->
            <div
                class=" bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-550px">
                <img src="<?php echo e(asset($product->image)); ?>" alt="" />
            </div>
            <!--end::Image-->

            <!--begin::Card-->
            <div class="card card-custom w-auto w-md-300px  w-xxl-400px ml-auto">
                <!--begin::Card Body-->
                <div class="card-body px-12 py-10">
                    <h3 class="font-weight-bolder font-size-h2 mb-1"><a href="#" class="text-dark-75"></a>
                        <?php echo e($product->name); ?>

                    </h3>
                    <br><br>
                    <?php $__currentLoopData = $product->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $variant->att_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex mb-3">

                        <span style="text-dark-50 flex-root font-weight-bold"><?php echo e($att_val->attribute->name .':'); ?>

                        </span>
                        <span class="text-dark flex-root font-weight-bold"><?php echo e($att_val->value); ?></span>

                        <span class="text-dark flex-root font-weight-bold"><?php echo e($variant->quantity); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--begin::Info-->


                    <div class="d-flex">
                        <span class="text-dark-50 flex-root font-weight-bold">In Stock</span>
                        <span class="text-dark flex-root font-weight-bold"><?php echo e($product->availableQuantity()); ?></span>
                        <a href="<?php echo e(route('showMove', ['id' => $variant->id])); ?>">
                            View
                        </a>

                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Card Body-->
    </div>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/products_js/show.blade.php ENDPATH**/ ?>