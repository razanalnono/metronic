<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addVariationForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">




                    <div class="form-group col-md-12">
                        <label for="product_id">Product</label>
                        <select class="form-control" name="product_id" id="product_id">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger formErrors slug_err"></span>
                    </div>


                    


                    <div class="form-group col-md-12">
                        <label for="attributes">Attributes</label>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="attributes[]" value="<?php echo e($attribute->id); ?>"
                                        id="attribute_<?php echo e($attribute->id); ?>">
                                    <label class="form-check-label" for="attribute_<?php echo e($attribute->id); ?>">
                                        <?php echo e($attribute->name); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="value[]" class="form-control" id="value_<?php echo e($attribute->id); ?>"
                                    placeholder="Enter value for <?php echo e($attribute->name); ?>" style="display:none">
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="quantity">quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity">
                        <span class="text-danger formErrors quantity_err"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price">
                        <span class="text-danger formErrors price_err"></span>
                    </div>




                    <div class="form-group col-md-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary addVariation">Add Variation</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    $('input[type=checkbox][name="attributes[]"]').change(function() {
    var attributeId = $(this).val();
    $('#value_' + attributeId).toggle();
  });
</script><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/variation/addVariation.blade.php ENDPATH**/ ?>