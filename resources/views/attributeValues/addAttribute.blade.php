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
                                <label for="attribute_id">Attribute</label>
                                <select class="form-control" name="attribute_id" id="attribute_id">
                                    @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger formErrors attribute_err"></span>
                 </div>


                <div class="modal-body">
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" class="form-control " name="value" id="value">
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


