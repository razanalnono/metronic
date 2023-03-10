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

                    <div class="row form-group col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_stockable" name="is_stockable">
                            <label class="form-check-label" for="is_stockable">Is Stockable</label>
                        </div>

                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity"
                            disabled>
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
                            <div class="form-group attribute-values col-md-12" style="display:none">
                                <div class="col-md-12">
                                    @foreach($attributes as $attribute)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input attribute-checkbox" type="checkbox" name="attributevalue[]"
                                                value="{{ $attribute->id }}" id="attribute_{{ $attribute->id }}">
                                            <label class="form-check-label" for="attribute_{{ $attribute->id }}">
                                                {{ $attribute->name }}
                                            </label>
                                        </div>
                                        <div class="row attribute-values-checkboxes attribute-values-checkboxes-{{ $attribute->id }}"
                                            style="display:none">
                                            @foreach($attribute->attributeValues as $value)
                                            <div class="form-check">
                                                &nbsp;&nbsp;&nbsp;
                                                @if($attribute->name == 'Color')
                                                <div class="color-box" style="background-color:{{ $value->value }}"></div>
                                                <input class="form-check-input attribute-value-checkbox" type="checkbox"
                                                name="attribute_values[{{ $attribute->id }}][]" value="{{ $value->id }}"
                                                id="value_{{ $attribute->id }}_{{ $value->id }}">
                                                @else
                    
                                                <label class="form-check-label" for="value_{{ $attribute->id }}_{{ $value->id }}">
                                                    {{ $value->value }} &nbsp;
                                                </label>

                                                <input class="form-check-input attribute-value-checkbox" type="checkbox" name="attribute_values[{{ $attribute->id }}][]"
                                                    value="{{ $value->id }}" id="value_{{ $attribute->id }}_{{ $value->id }}">
                                                 @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    
                        {{-- <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="var_price" id="var_price">
                            <span class="text-danger formErrors price_err"></span>
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="price">Qunatity</label>
                            <input type="text" class="form-control" name="var_quantity" id="var_quantity">
                            <span class="text-danger formErrors var_quantity_err"></span>
                        </div> --}}
                    
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
</style>