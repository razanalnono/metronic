@extends('layout.default')
@section('content')

<div class="card-body pt-4">
    <!--begin::Form-->
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

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
                        @foreach ($categories as $category )

                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

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
                                    @foreach($attributes as $attribute)
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input attribute-checkbox" type="checkbox"
                                                name="attributevalue[]" value="{{ $attribute->id }}"
                                                id="attribute_{{ $attribute->id }}">
                                            <label class="form-check-label font-weight-bold"
                                                for="attribute_{{ $attribute->id }}">
                                                {{ $attribute->name }}
                                            </label>
                                        </div>
                                        <div class="row attribute-values-checkboxes attribute-values-checkboxes-{{ $attribute->id }}"
                                            style="display:none">
                                            @foreach($attribute->attributeValues as $value)
                                            <div class="form-check">
                                                &nbsp;&nbsp;&nbsp;
                                                @if($attribute->name == 'Color')
                                                <div class="color-box p-5 rounded "
                                                    style="background-color:{{ $value->value }}">

                                                </div>
                                                <input class="form-check-input attribute-value-checkbox ml-2   "
                                                    type="checkbox"
                                                    style="position: absolute;top: 0;left: 28;height: 25px;width: 25px; opacity: 0; /* set opacity to 0 */border-radius: 50%;"
                                                    name="attribute_values[{{ $attribute->id }}][]"
                                                    value="{{ $value->id }}"
                                                    id="value_{{ $attribute->id }}_{{ $value->id }}">
                                                {{ $value->value }}
                                                @else

                                                <label class="form-check-label"
                                                    for="value_{{ $attribute->id }}_{{ $value->id }}">
                                                    {{ $value->value }} &nbsp;
                                                </label>

                                                <input class="form-check-input attribute-value-checkbox" type="checkbox"
                                                    name="attribute_values[{{ $attribute->id }}][]"
                                                    value="{{ $value->id }}"
                                                    id="value_{{ $attribute->id }}_{{ $value->id }}">
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
@endsection

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