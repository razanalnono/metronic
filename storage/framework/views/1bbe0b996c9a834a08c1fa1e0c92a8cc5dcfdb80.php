

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock
            </h3>
        </div>

    </div>

    


    <div class="card card-custom">
    


        <div class="card-body">
            <div class="table-responsive">

                <table class="table  table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Variant</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Movement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $product->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($variant->id); ?></td>

                            <td>
                                <?php $__currentLoopData = $variant->att_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex mb-3">

                                    <span style="text-dark-50 flex-root font-weight-bold"><?php echo e($att_val->attribute->name
                                        .':'); ?>

                                    </span>
                                    <span class="text-dark flex-root font-weight-bold"><?php echo e($att_val->value); ?></span>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>

                            <td>
                                <span class="text-dark flex-root font-weight-bold"><?php echo e($variant->price); ?></span>
                            </td>
                            <td>
                                <span class="text-dark flex-root font-weight-bold"><?php echo e($variant->quantity); ?></span>
                            </td>




                            <td data-field="Status" aria-label="4" class="datatable-cell">
                                <span>
                                    <?php echo e($productVariants->movement); ?>

                                     </span>
                            </td>



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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/products_js/show.blade.php ENDPATH**/ ?>