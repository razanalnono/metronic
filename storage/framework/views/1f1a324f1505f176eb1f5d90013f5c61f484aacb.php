<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addOptionForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Option</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">





                    <div class="form-group col-md-6">
                            <label for="attribute_id">Attributes</label>
                            <select class="form-control" name="attribute_id" id="attribute_id">
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger formErrors attributes_err"></span>
                        </div>


                        <div class="form-group col-md-6">
                                            <label for="variation_id">Variations</label>
                                            <select class="form-control" name="variation_id" id="variation_id">
                                                <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($variation->id); ?>"><?php echo e($variation->product->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger formErrors attributes_err"></span>
                                        </div>



                    <div class="form-group col-md-12">
                        <label for="quantity">Value</label>
                        <input type="text" class="form-control" name="value" id="value">
                        <span class="text-danger formErrors value_err"></span>
                    </div>

        




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary addOption">Add Variation</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/option/addOption.blade.php ENDPATH**/ ?>