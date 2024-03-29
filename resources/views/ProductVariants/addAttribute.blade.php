<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addAttributeForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="form-group col-md-12">
                    <label for="value_id">Attribute</label>
                    <select class="form-control" name="product_id" id="product_id">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger formErrors value_id"></span>
                </div>

                <div class="form-group col-md-12">
                    <label for="attributes">Attributes</label>
                    @foreach($attributes as $attribute)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input attribute-checkbox" type="checkbox" name="attributes[]"
                                    value="{{ $attribute->id }}" id="attribute_{{ $attribute->id }}">
                                <label class="form-check-label" for="attribute_{{ $attribute->id }}">
                                    {{ $attribute->name }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="attributevalues_id[]" class="form-control attribute-values-select"
                                id="value_{{ $attribute->id }}" multiple style="display:none">
                                @foreach($attribute->attributeValues as $value)
                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row col-md-12 ">
                    <div class="form-group col-md-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price">
                        <span class="text-danger formErrors price_err"></span>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity">
                        <span class="text-danger formErrors quantity_err"></span>
                    </div>
                </div>

                <div class="modal-body">





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info addAttribute">Add Variants</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Show attribute values select when its checkbox is checked
$('.attribute-checkbox').on('change', function() {
var select = $(this).closest('.row').find('.attribute-values-select');
if (this.checked) {
select.show();
} else {
select.hide();
}
});
</script>