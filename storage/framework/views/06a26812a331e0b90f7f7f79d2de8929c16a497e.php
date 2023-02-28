<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProductForm">
        <?php echo csrf_field(); ?>
        



        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="up_name_en" id="up_name_en">
                        <div class="errName"></div>
                    </div>


                    <div class="form-group">
                        <label for="name">اسم المنتج</label>
                        <input type="text" class="form-control" name="up_name_ar" id="up_name_ar">
                    </div>
                    <div class="form-group">
                        <label for="up_category_id">Category</label>
                        <select value="up_category_id" class="form-control" id="up_category_id" name="up_category_id">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger formErrors category_err"></span>

                    </div>


                    <div class="form-group">
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" name="up_quantity" id="up_quantity">
                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" class="form-control" name="up_price" id="up_price">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" class="form-control" name="up_description" id="up_description">
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" class="form-control" name="up_image" id="up_image">
                    </div>

                    <div class="form-group">
                        <label for="name">Enable</label>
                        <input type="checkbox" name="up_enabled_id" id="up_enabled_id">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateProduct">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/products_js/updateProduct_js.blade.php ENDPATH**/ ?>