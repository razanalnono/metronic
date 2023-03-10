<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addAttributeForm">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="form-group col-md-12 mt-8">
                    <label for="attribute_id">Attribute</label>
                    <select class="form-control" name="attribute_id" id="attribute_id">
                        <option>-Select Value-</option>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-danger formErrors attribute_err"></span>
                </div>

            


                <div class="modal-body">
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" class="form-control " name="value" id="value" style="">
                        <span class="text-danger formErrors value_err "></span>
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info addAttribute">Add Attribute</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    var colorPicker = document.getElementById("color-picker");
    $('#attribute_id').change(function() {
    var $option = $(this).find('option:selected');
    var value = $option.val(); //returns the value of the selected option.
    var text = $option.text(); //returns the text of the selected option.
if(text == 'Color'){
    console.log(text);
    colorPicker.style.display ="block";
$( "#size" ).prop( "disabled", true );}else{
    colorPicker.style.display = "none";
}


var colorInput = document.getElementById("value");

colorInput.addEventListener("change", function() {
  var hexValue = colorInput.value;
  // Store the hex value in the column here
});


});



</script><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/attributeValues/addAttribute.blade.php ENDPATH**/ ?>