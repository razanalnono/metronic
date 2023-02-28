<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateVariationForm">
        @csrf
        <input type="text" style="display: none;" class="form-control" value="{{$variation->id}}" name="up_id" id="up_id">



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
                            @foreach ($products as $product )
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors category_err"></span>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="attribute_id">Attributes</label>
                        <select class="form-control" name="up_attribute_id" id="up_attribute_id">
                            @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors slug_err"></span>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label for="value">Value</label>
                        <input type="text" class="form-control" name="up_value" id="up_value">
                        <span class="text-danger formErrors value_err"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" name="up_quantity" id="up_quantity">
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
</div>