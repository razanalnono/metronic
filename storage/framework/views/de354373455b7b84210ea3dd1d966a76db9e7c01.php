

<?php $__env->startSection('content'); ?>
<div class="container bg-white">
    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
        <div class="col-md-10">
            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                <h1 class="display-4 font-weight-boldest mb-10">Drafted Orders</h1>
                <div class="d-flex flex-column align-items-md-end px-0">
                    <!--begin::Logo-->
                    <a href="#" class="mb-5">
                        <img src="/metronic/theme/html/demo1/dist/assets/media/logos/logo-dark.png" alt="">
                    </a>
                    <!--end::Logo-->

                </div>
            </div>
            <div class="border-bottom w-100 "></div>


            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table center">
                            <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted  text-uppercase">Ordered id</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Order case</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Order Created</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Order Creator</th>  
                                    <th class="text-right font-weight-bold text-muted text-uppercase">No. Of Items</th>                       
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-weight-boldest">
                                    <td class="border-0 pt-7 d-flex align-items-center">
                                        <span class="opacity-80"><?php echo e($order->id); ?></span>
                                    </td>
                                    <td class="text-center pt-7 align-middle">
                                        <?php if(isset($order->cases) && isset($order->cases->case)): ?>
                                        <span class="opacity-80"><?php echo e($order->cases->case->name); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-right pt-7 align-middle ">
                                        <div class=" flex-col">
                                            <div class="opacity-80"><?php echo e($order->created_at->format('Y-m-d ')); ?></div>
                                            <div class="opacity-80"><?php echo e($order->created_at->format('H:i:s ')); ?></div>
                                        </div>
                                    </td>
                                
                                    <td class="text-center pt-7 align-middle">

                                     <span class="opacity-80"><?php echo e(isset($order->user) ? $order->user->name : ''); ?></span>
                                    </td>

<td class="text-center pt-7 align-middle">

    <span class="opacity-80"><?php echo e(isset($order->items) ? count($order->items) : ''); ?></span>
</td>
                                    

                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">
                                        <div class="flex-root d-flex ">
                                            <div class="opacity-80">
                                              
                                                <a href="<?php echo e(route('orders.show',$order->id)); ?>"> Show</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">

                                            <div class="flex-root d-flex ">
                                                <div class="opacity-80">
                                                    <form action="<?php echo e(route('orders.accept', ['order' => $order->id])); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <?php if($order->logs): ?>
                                                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">
                                            <div class="flex-root d-flex ">
                                                <div class="opacity-80">
                                                    <form action="<?php echo e(route('orders.cancel', ['order' => $order->id])); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                      <?php if($order->logs()->whereIn('order_cases_id', [2, 6, 7])->exists()): ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" disabled>Cancel </button>
                                                    <?php else: ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                    <?php endif; ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('orders.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/orders/index.blade.php ENDPATH**/ ?>