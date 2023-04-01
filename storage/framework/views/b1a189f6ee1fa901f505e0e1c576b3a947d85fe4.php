
<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($role->name); ?></h3>

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


                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($permission->id); ?></td>
                                    <td><?php echo e($permission->name); ?></td>
                                    <td><span class="badge bg-success"><?php echo e($permission->guard_name); ?></span></td>

                                    <td>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="permission_<?php echo e($permission->id); ?>"
                                                onchange="performStore(<?php echo e($role->id); ?>,<?php echo e($permission->id); ?>)"
                                                <?php if($permission->assign): ?> checked <?php endif; ?>>

                                            <label for="permission_<?php echo e($permission->id); ?>">
                                            </label>
                                        </div>

                                    </td>
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
<script>
    function performStore(roleId,permissionId){
        let data={
          permission_id:permissionId,
        

        };
        store('/roles/'+roleId+'/permissions',data);
      }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/admin/roles/rolepermissions.blade.php ENDPATH**/ ?>