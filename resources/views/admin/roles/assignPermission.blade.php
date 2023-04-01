

{{-- //BESTTT --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
<form action="{{ route('assignPermissions.store') }}" method="post" id="assignPermissionForm">
        @csrf
    @foreach($permissions as $permission)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
            id="permission_{{ $permission->id }}">
        <label class="form-check-label" for="permission_{{ $permission->id }}">
            {{ $permission->name }}
        </label>
    </div>
    @endforeach
    <input type="hidden" name="role_id" value="{{ $role->id }}">
    <button type="button" class="btn btn-primary assignPermission" onclick="performStore()">Assign Permissions</button>
</form>
</div>
<script>
    function performStore() {
    let data = $('form').serialize();
    $.ajax({
        url: '{{ route('assignPermissions.store') }}',
        type: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            alert('Permissions assigned successfully!');
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            alert('Permission assignment failed!');
        }
    });
}
</script>
