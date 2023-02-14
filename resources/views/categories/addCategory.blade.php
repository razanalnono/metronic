<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addCategoryForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control " name="name_en" id="name_en">
                        <span class="text-danger formErrors name_en_err "></span>

                    </div>
                    <div class="form-group">
                        <label for="name">اسم القسم</label>
                        <input type="text" class="form-control" name="name_ar" id="name_ar">
                        <span class="text-danger formeErrors name_ar_err "></span>

                    </div>

                    <div class="form-group">
                        <label for="name">Parent</label>
                        <select value="parrent_id" class="form-control" name="parent_id" id="parent_id">
                            <option value="">No Parent</option>

                            @foreach ($parents as $parent )
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger formErrors parent_err"></span>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info addCategory">Add Category</button>
                </div>
            </div>
        </div>
    </form>
</div>


