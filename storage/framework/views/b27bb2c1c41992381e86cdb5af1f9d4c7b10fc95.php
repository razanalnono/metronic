<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateValueForm">
        <?php echo csrf_field(); ?>
        <input type="text" style="display: none;" class="form-control" value="<?php echo e($order->id); ?>" name="up_id"
            id="up_id">



        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div class="form-group col-md-12">
                        <label for="name">Add Comment:</label>
                        <input type="text" class="form-control" name="up_comment" id="up_comment">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateValue">Update Value</button>
                </div>
            </div>
        </div>
    </form>
</div><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/orders/update.blade.php ENDPATH**/ ?>