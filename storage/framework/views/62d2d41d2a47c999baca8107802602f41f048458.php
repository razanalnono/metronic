<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">  
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMovementModalLabel">Add Stock Movement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('add.stock')); ?>" id="addMovementForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="movement">Movement</label>
                        <select class="form-control" id="movement" name="movement" required>
                            <option value="push">Push</option>
                            <option value="pull">Pull</option>
                        </select>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="product_variants_id" value="<?php echo e($stock->product_variants_id); ?>">
                    <button type="submit" class="btn btn-primary addMovement">Add Movement</button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/stock/create.blade.php ENDPATH**/ ?>