<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addProductForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">

                    <div class="form-group col-md-6">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name_en" id="name_en">
                        <span class="text-danger formErrors name_en_err "></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">اسم المنتج</label>
                        <input type="text" class="form-control" name="name_ar" id="name_ar">
                        <span class="text-danger formErrors name_ar_err "></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors slug_err"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price">
                        <span class="text-danger formErrors price_err"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <input type="text" class="form-control 1h-12 col-12" name="description" id="description">
                                <span class="text-danger formErrors description_err"></span>
                            </div>
                    {{-- <div class="form-group col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_enabled" name="is_enabled">
                            <label class="form-check-label" for="is_enabled">Enable</label>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_stockable" name="is_stockable">
                        <label class="form-check-label" for="is_stockable">Is Stockable</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" disabled>
                        <span class="text-danger formErrors quantity_err"></span>
                    </div>




            

                    <div class="form-group">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="have_variation" id="have_variation">
                                <label class="form-check-label" for="have_variation">
                                    Have Variation
                                </label>
                            </div>
                    </div>

              <div class="form-group attribute-values col-md-12" style="display:none">
                <div class="row">
                    @foreach($attributes as $attribute)
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input attribute-checkbox" type="checkbox" name="attributevalues_id[]"
                                value="{{ $attribute->id }}" id="attribute_{{ $attribute->id }}">
                            <label class="form-check-label" for="attribute_{{ $attribute->id }}">
                                {{ $attribute->name }}
                            </label>
                        </div>
                        <select name="attribute_values[{{ $attribute->id }}][]"
                            class="form-control attribute-values-select attribute-values-select-{{ $attribute->id }}"
                            id="value_{{ $attribute->id }}" multiple style="display:none">
                            @foreach($attribute->attributeValues as $value)
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                </div>

                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="var_price" id="var_price">
                    <span class="text-danger formErrors price_err"></span>
                </div>

                <div class="form-group col-md-6">
                        <label for="price">Qunatity</label>
                        <input type="text" class="form-control" name="var_quantity" id="var_quantity">
                        <span class="text-danger formErrors var_quantity_err"></span>
                </div>

            </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary addProduct">Add Product</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


    $(document).ready(function() {
        $('#is_stockable').on('change', function() {
            if ($(this).is(':checked')) {
                $('#quantity').prop('disabled', false);
                $('#have_variation').prop('disabled', false);
            } else {
                $('#quantity').prop('disabled', true);
                $('#have_variation').prop('disabled', true);
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
$("#var_price").keyup(function(){
update();
});

function update() {
$("#var_price").val($('#price').val());
}
});

    
</script>