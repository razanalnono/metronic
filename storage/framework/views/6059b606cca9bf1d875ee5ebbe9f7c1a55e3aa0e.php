

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock</h3>
        </div>
    </div>

    <div class="float-xl-right" style="position: absolute; right:0; top:1rem">
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-light-primary font-weight-bolder btn-md ">Add To
            Stock</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table  table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Variant</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Movement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($stock->id); ?></td>

                        <td><?php echo e($stock->product->name ?? "Def"); ?></td>

                        <td>
                            <?php if($stock->variants): ?>
                            <?php $__currentLoopData = $stock->variants->att_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="color:#333;font-weight:bold"><?php echo e($att_val->attribute->name .':'); ?> </span>

                            <span><?php echo e($att_val->value); ?></span>
                            <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>

                            <?php echo e("DEF"); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($stock->variants): ?>
                            <?php echo e($stock->variants->price); ?>

                            <?php else: ?>
                            <?php echo e($stock->product->price ?? "0"); ?>

                            <?php endif; ?>
                        </td>

                        <td><?php if($stock->variants): ?>
                            <?php echo e($stock->variants->quantity); ?>

                            <?php else: ?>
                            <?php echo e($stock->quantity); ?>

                            <?php endif; ?></td>


                        <td data-field="Status" aria-label="4" class="datatable-cell">
                            <span style="width: 126px;">
                                <span
                                    class="label label-inline label-pill <?php echo e($stock->movement === 'push' ? 'label-success' : 'label-danger'); ?>">
                                    <?php echo e($stock->movement); ?>

                                </span>
                            </span>
                        </td>

                        <td>
                            <div class="btn-group" style="position: relative; left:-10px;">
                                

                                <?php if($stock->product): ?>
                                <a href="<?php echo e(route('showMove', ['id' => $stock->product->id])); ?>">
                                    View
                                </a>
                                <?php endif; ?>

                                


                        <td>

                        </td>
        </div>

        </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
    </div>
</div>


</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/stock/index.blade.php ENDPATH**/ ?>