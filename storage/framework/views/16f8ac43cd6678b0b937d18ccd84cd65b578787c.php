


<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
<form action="<?php echo e(route('assignPermissions.store')); ?>" method="post" id="assignPermissionForm">
        <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"
            id="permission_<?php echo e($permission->id); ?>">
        <label class="form-check-label" for="permission_<?php echo e($permission->id); ?>">
            <?php echo e($permission->name); ?>

        </label>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
    <button type="button" class="btn btn-primary assignPermission" onclick="performStore()">Assign Permissions</button>
</form>
</div>
<script>
    function performStore() {
    let data = $('form').serialize();
    $.ajax({
        url: '<?php echo e(route('assignPermissions.store')); ?>',
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
<?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/admin/roles/assignPermission.blade.php ENDPATH**/ ?>