<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication-->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image:">

            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                
                <!--end::Logo-->

                <!--begin::Wrapper-->
                <div class="<?php echo e($wrapperClass ?? ''); ?> bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <?php echo e($slot); ?>

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="" class="text-muted text-hover-primary px-2"><?php echo e(__('About')); ?></a>

                    <a href="" class="text-muted text-hover-primary px-2"><?php echo e(__('Contact Us')); ?></a>

                    <a href="" class="text-muted text-hover-primary px-2"><?php echo e(__('Purchase')); ?></a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/auth/layout.blade.php ENDPATH**/ ?>