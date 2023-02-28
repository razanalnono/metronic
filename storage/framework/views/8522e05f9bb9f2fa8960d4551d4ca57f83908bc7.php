<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateVariationForm">
        <?php echo csrf_field(); ?>
        <input type="text" style="display: none;" class="form-control" value="<?php echo e($variation->id); ?>" name="up_id" id="up_id">



        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
               

                    <div class="form-group col-md-12">
                        <label for="up_product_id">Product</label>
                        <select value="up_product_id" class="form-control" id="up_product_id" name="up_product_id">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger formErrors up_product_err"></span>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="attribute_id">Attributes</label>
                        <select class="form-control" name="up_attribute_id" id="up_attribute_id">
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger formErrors up_slug_err"></span>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="value">Value</label>
                        <input type="text" class="form-control" name="up_value" id="up_value">
                        <span class="text-danger formErrors up_value_err"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" name="up_quantity" id="up_quantity">
                        <span class="text-danger formErrors up_quantity_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Price</label>
                        <input type="text" class="form-control" name="up_price" id="up_price">
                    </div>
       
                    <div class="form-group col-md-12">
                        <label for="name">Image</label>
                        <input type="file" class="form-control" name="up_image" id="up_image">
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateVariation">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/variation/updateVariation.blade.php ENDPATH**/ ?>