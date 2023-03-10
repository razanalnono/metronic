
<?php $__env->startSection('content'); ?>

<div class="card-body pt-4">
    <!--begin::Form-->
    <form action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!--begin::Product info-->
        <div class="mt-6">
            <div class="text-muted mb-4 font-weight-bolder font-size-lg">Product Info</div>
            <!--begin::Input-->

            <div class="row">
                <div class="form-group mb-8 col-md-6">
                    <label class="font-weight-bolder">Name</label>
                    <input type="text" name="name_en" class="form-control form-control-solid form-control-lg" placeholder="">
                </div>
                <div class="form-group mb-8 col-md-6">
                    <label class="font-weight-bolder"> الاسم</label>
                    <input type="text" name="name_ar" class="form-control form-control-solid form-control-lg" placeholder="">
                </div>

            </div>
            <div class="row">
                <div class="form-group mb-8 col-md-6">
                    <label class="font-weight-bolder">Category</label>
                    <select class="form-control form-control-solid form-control-lg" name="category_id">
                        <option>Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="font-weight-bolder">Price</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" placeholder="" id="price"
                        name="price">
                </div>
            </div>

            <div class="form-group mb-8">
                <label for="exampleTextarea" class="font-weight-bolder">Description</label>
                <textarea class="form-control form-control-solid form-control-lg" rows="3" name="description"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="row">

                <div class=" form-group form-check col-md-6">

                    <label class="form-check-label mb-8 mr-8 font-weight-bolder" for="is_stockable">Is Stockable</label>
                    <input type="checkbox" class="form-check-input" id="is_stockable" name="is_stockable">

                    <div class="form-group">
                        <input type="number" class="form-control col-md-3 " name="quantity" id="quantity"
                            placeholder="quantity" disabled>
                        <span class="text-danger formErrors quantity_err"></span>
                    </div>
                </div>
                <div class="form-group col-md-6">

                    <div class="form-check">
                        <label class="form-check-label font-weight-bolder mb-8 mr-8" for="have_variation">Have
                            Variation</label>
                        <input class="form-check-input" type="checkbox" name="have_variation" id="have_variation">
                    </div>


                    <div class="form-group attribute-values " style="display:none">
                        <div class="row">
                            <div class="form-group attribute-values col-md-12" style="display:none">
                                <div class="col-md-12">
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input attribute-checkbox" type="checkbox"
                                                name="attributevalue[]" value="<?php echo e($attribute->id); ?>"
                                                id="attribute_<?php echo e($attribute->id); ?>">
                                            <label class="form-check-label font-weight-bold"
                                                for="attribute_<?php echo e($attribute->id); ?>">
                                                <?php echo e($attribute->name); ?>

                                            </label>
                                        </div>
                                        <div class="row attribute-values-checkboxes attribute-values-checkboxes-<?php echo e($attribute->id); ?>"
                                            style="display:none">
                                            <?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check">
                                                &nbsp;&nbsp;&nbsp;
                                                <?php if($attribute->name == 'Color'): ?>
                                                <div class="color-box p-5 rounded "
                                                    style="background-color:<?php echo e($value->value); ?>">

                                                </div>
                                                <input class="form-check-input attribute-value-checkbox ml-2   "
                                                    type="checkbox"
                                                    style="position: absolute;top: 0;left: 28;height: 25px;width: 25px; opacity: 0; /* set opacity to 0 */border-radius: 50%;"
                                                    name="attribute_values[<?php echo e($attribute->id); ?>][]"
                                                    value="<?php echo e($value->id); ?>"
                                                    id="value_<?php echo e($attribute->id); ?>_<?php echo e($value->id); ?>">
                                                <?php echo e($value->value); ?>

                                                <?php else: ?>

                                                <label class="form-check-label"
                                                    for="value_<?php echo e($attribute->id); ?>_<?php echo e($value->id); ?>">
                                                    <?php echo e($value->value); ?> &nbsp;
                                                </label>

                                                <input class="form-check-input attribute-value-checkbox" type="checkbox"
                                                    name="attribute_values[<?php echo e($attribute->id); ?>][]"
                                                    value="<?php echo e($value->id); ?>"
                                                    id="value_<?php echo e($attribute->id); ?>_<?php echo e($value->id); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
                
            </div>
            
            
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">Save</button>
                <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Discard</button>
            </div>



        </div>



    </form>






</div>


<!--end::Input-->

<!--end::Product info-->

<!--end::Form-->
<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#is_stockable').on('change', function() {
            if ($(this).is(':checked')) {
                $('#quantity').prop('disabled', false);
            } else {
                $('#quantity').prop('disabled', true);
            }
        });
    });


    
    $(document).ready(function() {
    $('#have_variation').click(function() {
    if ($(this).prop('checked')) {
    $('.attribute-values').show();
    } else {
    $('.attribute-values').hide();
    }
    });
    });
    // Show attribute values select when its checkbox is checked
    $('.attribute-checkbox').on('change', function() {
    // Get the ID of the corresponding select box
    var attributeId = $(this).val();
    var selectBox = $('.attribute-values-select-' + attributeId)
    
    // Enable/disable the select box based on the checkbox value
    if ($(this).is(':checked')) {
    selectBox.prop('disabled', false).show();
    } else {
    selectBox.prop('disabled', true).hide();
    }
    });


$(document).ready(function() {
$('.attribute-checkbox').change(function() {
var attributeId = $(this).val();
var checkboxesDiv = $('.attribute-values-checkboxes-' + attributeId);
if ($(this).is(':checked')) {
checkboxesDiv.show();
} else {
checkboxesDiv.hide();
}
});

$('.attribute-value-checkbox').change(function() {
var productId = $('#product_id').val();
var attributeId = $(this).closest('.attribute-values-checkboxes').data('attribute-id');
var attributeValues = [];
$('.attribute-value-checkbox[name="attribute_values[' + attributeId + '][]"]:checked').each(function() {
attributeValues.push($(this).val());
});

});
});

    





</script>


<style>
    .color-box {
        width: 20px;
        height: 20px;
        display: inline-block;
        margin-right: 5px;
    }

    .form-check-input:checked {
        border-radius: 50%;
        background-color: red;
    }
</style>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/products_js/create.blade.php ENDPATH**/ ?>