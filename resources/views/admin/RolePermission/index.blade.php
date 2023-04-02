@extends('layout.default')
@section('content')

{{-- //BESTTT --}}
<h2>Assign Permissions for  {{ $role->name }}</h2>





<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $role->name }}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Assigned</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($permissions as $permission )
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>

                                    <td>
                                        <div class="icheck-primary d-inline">
                                       <form id="permissions-form">
                                        @csrf
                                        @foreach($permissions as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                id="permission_{{ $permission->id }}" @if(in_array($permission->id, $assignedPermissionIds)) checked @endif
                                            onchange="updatePermissions()">
                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                                    </form>
                                        </div>

                                    </td>
                                    @endforeach



                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>




<script>
    function updatePermissions() {
    let formData = new FormData($('#permissions-form')[0]);
    $.ajax({
      url: '{{ route('assignPermissions.store') }}',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        console.log(response);
        alert('Permissions updated successfully!');
      },
      error: function(xhr) {
        console.log(xhr.responseText);
        alert('Permission update failed!');
      }
    });
  }
</script>
@endsection