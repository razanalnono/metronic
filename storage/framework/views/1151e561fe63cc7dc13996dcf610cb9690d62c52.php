<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateVariantForm">
        <?php echo csrf_field(); ?>
        <input type="text" style="display: none;" class="form-control" value="<?php echo e($variant->id); ?>" name="up_id"
            id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Variant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Quantity</label>
                        <input type="number" class="form-control" name="up_quantity" id="up_quantity">
                        <div class="errQunatity"></div>
                    </div>


                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" class="form-control" name="up_price" id="up_price">
                        <div class="errQuantity"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateVariant">Update Attribute</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/ProductVariants/updateVariant.blade.php ENDPATH**/ ?>