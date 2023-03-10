<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateValueForm">
        @csrf
<input type="text" style="display: none;" class="form-control" value="{{$attributeValue->id}}" name="up_id" id="up_id">      



<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    

                    <div class="form-group col-md-12 ">
                        <label for="attribute_id">Attribute</label>
                        <select class="form-control" name="attribute_id" id="attribute_id">
                            <option>-Select Attribute-</option>
                            @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors attribute_err"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="name">Update Value:</label>
                        <input type="text" class="form-control" name="up_value" id="up_value">
                    </div>


       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateValue">Update Value</button>
                </div>
            </div>
        </div>
    </form>
</div>