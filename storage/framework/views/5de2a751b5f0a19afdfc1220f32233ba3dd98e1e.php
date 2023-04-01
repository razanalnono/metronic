

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock
            </h3>
        </div>
    
    </div>
 
 <div class="float-xl-left" style="position: absolute;
    left: 69pc;"><a href="#" class="btn btn-light-info font-weight-bolder btn-md updateStockForm"
        data-bs-toggle="modal" data-bs-target="#addModal">Add to Stock</a></div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table  table-hover">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Movements</th>
                
                    </tr>
                </thead><tbody>

                 <?php $__currentLoopData = $movements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($movement->quantity); ?></td>
                        <td><?php echo e($stock->movement); ?></td>
                    </tr>
        </div>

        </td>
        </tr>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<div class="form-group">
<label for="quantity">Quantity Available:</label>
<input type="text" name="quantity" id="quantity" value="<?php echo e($product->availableQuantity()); ?>" class="form-control"  readonly>
    </div>
    </div>
</div>


</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php echo $__env->make('stock.stock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
<?php echo $__env->make('stock.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('stock.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/stock/show.blade.php ENDPATH**/ ?>