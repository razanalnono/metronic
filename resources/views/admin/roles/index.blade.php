@extends('layout.default')
@section('content')

<head>
    <!-- other head elements -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>

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
                                    <th>Permissions</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($roles as $role )
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>

                                    <td><span class="badge bg-success">{{$role->guard_name}}</span></td>
                                    <td>
                                        <a href="{{ route('roles.permissions',$role->id) }}"
                                            class="btn btn-info btn-flat">{{ count($role->permissions) }}Permission/s</a>

                                            <div class="card-toolbar">
                                                <a href="{{ route('roles.permissions',$role->id) }}" class="btn btn-danger font-weight-bolder font-size-sm assignPermissionForm"
                                                        data-bs-toggle="modal" data-bs-target="#addModal">Add Permission</a></div>
                                    </td>

                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>

                                    <td>
                                       
                                    </td>
                                </tr>
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
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('admin.roles.assignPermission')

@endsection