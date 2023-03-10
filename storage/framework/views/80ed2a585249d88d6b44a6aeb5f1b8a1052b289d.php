
<?php $__env->startSection('content'); ?>
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Trash Table
            </h3>
        </div>

    </div>

    <div class="float-xl-left" style="position: relative;
    left: 69pc;"><a href="#" class="btn btn-light-info font-weight-bolder btn-md addProductForm" data-bs-toggle="modal"
            data-bs-target="#addModal">New Product</a>

        <a href="<?php echo e(route('trash')); ?>">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                            fill="#000000" fill-rule="nonzero" />
                        <path
                            d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                            fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>
    <div class="card-body" style="padding: 2rem 4.25rem;">

        <div class="datatable datatable-default datatable-bordered datatable-loaded">
            <table class="datatable-bordered datatable-head-custom datatable-table" id="kt_datatable"
                style="display: block;">
                <thead class="datatable-head">
                    <tr class="datatable-row" style="left: 0px;">
                        <th data-field="Order ID" class="datatable-cell datatable-cell-sort"><span
                                style="width: 126px;">Product ID</span></th>
                        <th data-field="Car Make" class="datatable-cell datatable-cell-sort"><span
                                style="width: 126px;">Product Name</span></th>


                        <th data-field="Car Make" class="datatable-cell datatable-cell-sort"><span
                                style="width: 126px;">Slug</span>
                        </th>


                        <th data-field="Type" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort">
                            <span style="width: 126px;">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody style="" class="datatable-body">




                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                    <tr data-row="5" class="datatable-row datatable-row-even" style="left: 0px;">


                        <td data-field="Order ID" aria-label="54753-003" class="datatable-cell"><span
                                style="width: 126px;"><?php echo e($product->id); ?></span></td>



                        <td data-field="Deposit Paid" aria-label="$39286.74" class="datatable-cell"><span
                                style="width: 126px;"><?php echo e($product->getTranslation('name','en')); ?>

                                <div>

                                    <?php echo e($product->getTranslation('name','ar')); ?>

                                </div>
                            </span></td>


                        <td data-field="Order ID" aria-label="54753-003" class="datatable-cell">
                            <span style="width: 126px; position: relative;
                             left: -4pc;"><?php echo e($product->slug); ?></span>
                        </td>


                        <td>
                            <form action="<?php echo e(route('restore',$product->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="btn-group" style="position: relative; left:-100px;">
                                    <a href="#" class="btn btn-icon  updateProductForm" data-bs-toggle="modal">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Share.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M10.9,2 C11.4522847,2 11.9,2.44771525 11.9,3 C11.9,3.55228475 11.4522847,4 10.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,16 C20,15.4477153 20.4477153,15 21,15 C21.5522847,15 22,15.4477153 22,16 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L10.9,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M24.0690576,13.8973499 C24.0690576,13.1346331 24.2324969,10.1246259 21.8580869,7.73659596 C20.2600137,6.12944276 17.8683518,5.85068794 15.0081639,5.72356847 L15.0081639,1.83791555 C15.0081639,1.42370199 14.6723775,1.08791555 14.2581639,1.08791555 C14.0718537,1.08791555 13.892213,1.15726043 13.7542266,1.28244533 L7.24606818,7.18681951 C6.93929045,7.46513642 6.9162184,7.93944934 7.1945353,8.24622707 C7.20914339,8.26232899 7.22444472,8.27778811 7.24039592,8.29256062 L13.7485543,14.3198102 C14.0524605,14.6012598 14.5269852,14.5830551 14.8084348,14.2791489 C14.9368329,14.140506 15.0081639,13.9585047 15.0081639,13.7695393 L15.0081639,9.90761477 C16.8241562,9.95755456 18.1177196,10.0730665 19.2929978,10.4469645 C20.9778605,10.9829796 22.2816185,12.4994368 23.2042718,14.996336 L23.2043032,14.9963244 C23.313119,15.2908036 23.5938372,15.4863432 23.9077781,15.4863432 L24.0735976,15.4863432 C24.0735976,15.0278051 24.0690576,14.3014082 24.0690576,13.8973499 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(15.536799, 8.287129) scale(-1, 1) translate(-15.536799, -8.287129) " />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                </div>
                            </form>




                            <form action="<?php echo e(route('forceDelete',$product->id)); ?>" class="btn btn-icon" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Share.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                            </form>


        </div>

        </td>


        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
        </table>



    </div>
    <!--end: Datatable-->
</div>
</div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/products_js/trash.blade.php ENDPATH**/ ?>