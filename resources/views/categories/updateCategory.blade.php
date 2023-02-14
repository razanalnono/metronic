<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateCategoryForm">
        @csrf
<input type="text" style="display: none;" class="form-control" value="{{$category->id}}" name="up_id" id="up_id">      



<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="up_name_en" id="up_name_en">
                        <div class="errName"></div>
                    </div>


                    <div class="form-group">
                        <label for="name">اسم القسم</label>
                        <input type="text" class="form-control" name="up_name_ar" id="up_name_ar">
                    </div>
                    <div class="form-group">
                        <label for="up_parent_id">Parent</label>
                        <select value="up_parent_id" class="form-control" id="up_parent_id" name="up_parent_id">
                            <option value="">No Parent</option>

                            @foreach ($parents as $parent )
                            <option value="{{ $parent->id }}" >{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors parent_err"></span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateCategory">Update Category</button>
                </div>
            </div>
        </div>
    </form>
</div>