

<?php $__env->startSection('content'); ?>
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Permissions</span>
        </h3>
        
        <div class="card-toolbar"><a href="#"
                class="btn btn-danger font-weight-bolder font-size-sm createPermissionForm" data-bs-toggle="modal"
                data-bs-target="#addModal">New Permission</a></div>



    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                    <thead>
                        <tr class="text-left text-uppercase">
                            <th style="min-width: 250px" class="pl-1"><span class="text-dark-75">Permission</span></th>
                            <th style="min-width: 100px; padding-left:4%;">Actions</th>

                            <th style="min-width: 80px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="pl-0 py-8">
                                <div class="d-flex align-items-center">

                                    <div>
                                        <a href="#"
                                            class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"><?php echo e($permission->name); ?></a>
                                    </div>
                                </div>
                            </td>

                            <td class="p-3">
                                <div class="d-flex align-items-center ">
                                <a href="#"
                                    class="btn btn-light-success font-weight-bolder font-size-sm text-uppercase text-center ml-3 updatePermissionForm"
                                    data-bs-toggle="modal" data-bs-target="#updateModal"
                                    data-id="<?php echo e($permission->id); ?>">Edit</a>
                                <form method="POST" action="#">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button
                                        class="btn btn-light-danger font-weight-bolder font-size-sm text-uppercase text-center   ml-1 deletePermission"
                                        data-id="<?php echo e($permission->id); ?>">
                                  Delete </button>
                                </form>
                            </div>
                            </td>

                            <td class="pr-0 text-right">
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Body-->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php echo $__env->make('admin.permissions.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.permissions.permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.permissions.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>