<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateAttributeForm">
        @csrf
{{-- <input type="text" style="display: none;" class="form-control" value="{{$attribute->id}}" name="up_id" id="up_id">       --}}



<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Attribute Name</label>
                        <input type="text" class="form-control" name="up_name" id="up_name">
                        <div class="errName"></div>
                    </div>


       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateAttribute">Update Attribute</button>
                </div>
            </div>
        </div>
    </form>
</div>