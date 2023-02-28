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

                    <div class="form-group col-md-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_enabled" name="is_enabled">
                            <label class="form-check-label" for="is_enabled">Enable</label>
                        </div>
                    </div>

    <div class="form-check col-md-6">
        <input type="checkbox" class="form-check-input" id="is_stockable" name="is_stockable">
        <label class="form-check-label" for="is_stockable">Is Stockable</label>
    </div>

    <div class="form-group col-md-6">
            <label for="quantity">quantity</label>
            <input type="text" class="form-control" name="quantity" id="quantity">
            <span class="text-danger formErrors quantity_err"></span>
        </div>
    
        <div class="variant-attributes">
            <h5>Variant Attributes:</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach ($product->variants->first()->attributes as $attribute)
                        <th scope="col">{{ $attribute->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->variants as $variant)
                    <tr>
                        @foreach ($variant->values as $value)
                        <td>{{ $value->value }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <input type="text" class="form-control 1h-12 col-12" name="description" id="description">
                        <span class="text-danger formErrors description_err"></span>
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
</script>