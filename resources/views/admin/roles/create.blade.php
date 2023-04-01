<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="createRoleForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Create Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control " name="name" id="name">
                        {{-- @error('name')
                        <span class="text-danger  ">{{ $message }}</span>
                        @enderror --}}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info createRole">Add Role</button>
                </div>
            </div>
        </div>
    </form>


        <form method="POST" action="">
            @csrf
            <div class="sm:col-span-6">
                <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                <select id="permission" name="permission" autocomplete="permission-name"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('name')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
    </div>
    </form>

</div>