
<?php $__env->startSection('content'); ?>

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


                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($role->id); ?></td>
                                    <td><?php echo e($role->name); ?></td>

                                    <td><span class="badge bg-success"><?php echo e($role->guard_name); ?></span></td>
                                    <td>
                                        <a href="<?php echo e(route('roles.permissions',$role->id)); ?>"
                                            class="btn btn-info btn-flat"><?php echo e(count($role->permissions)); ?>Permission/s</a>

                                            <div class="card-toolbar">
                                                <a href="<?php echo e(route('roles.permissions',$role->id)); ?>" class="btn btn-danger font-weight-bolder font-size-sm assignPermissionForm"
                                                        data-bs-toggle="modal" data-bs-target="#addModal">Add Permission</a></div>
                                    </td>

                                    <td><?php echo e($role->created_at); ?></td>
                                    <td><?php echo e($role->updated_at); ?></td>

                                    <td>
                                       
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php echo $__env->make('admin.roles.assignPermission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>