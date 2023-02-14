
<?php if(true): ?>
<?php echo $__env->yieldContent('content'); ?>
<?php else: ?>
<div class="d-flex flex-column-fluid">
    <div class="<?php echo e(Metronic::printClasses('content-container', false)); ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
</div>
<?php endif; ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/layout/base/_content.blade.php ENDPATH**/ ?>