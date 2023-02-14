<?php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
?>
 
<div id="kt_quick_user" class="offcanvas offcanvas-<?php echo e($direction); ?> p-10">
	
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	
    <div class="offcanvas-content pr-5 mr-n5">
		
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('<?php echo e(asset('media/users/300_21.jpg')); ?>')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					<?php echo e(Auth::user()->name); ?>

				</a>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								<?php echo e(Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary")); ?>

							</span>
                            <span class="navi-text text-muted text-hover-primary"><?php echo e(Auth::user()->email); ?></span>


							
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:">
								<?php echo csrf_field(); ?>
								<a href="<?php echo e(route('logout')); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" > Logout</a>
							</form>
                        </span>
                    </a>
                </div>
            </div>
        </div>



		
		<div class="separator separator-dashed my-7"></div>

		
		<div>
			
        	<h5 class="mb-5">
            	Recent Notifications
        	</h5>

			
	        <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-warning mr-5">
	                <?php echo e(Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg")); ?>

	            </span>

	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another purpose persuade</a>
	                <span class="text-muted font-size-sm">Due in 2 Days</span>
	            </div>

	            <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
	        </div>

	        
	        <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-success mr-5">
	                <?php echo e(Metronic::getSVG("media/svg/icons/Communication/Write.svg", "svg-icon-lg")); ?>

	            </span>
	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would be to people</a>
	                <span class="text-muted font-size-sm">Due in 2 Days</span>
	            </div>

	            <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
	        </div>

	        
	        <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-danger mr-5">
	                <?php echo e(Metronic::getSVG("media/svg/icons/Communication/Group-chat.svg", "svg-icon-lg")); ?>

	            </span>
	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Purpose would be to persuade</a>
	                <span class="text-muted font-size-sm">Due in 2 Days</span>
	            </div>

	            <span class="font-weight-bolder text-danger py-1 font-size-lg">-27%</span>
	        </div>

	        
	        <div class="d-flex align-items-center bg-light-info rounded p-5">
	            <span class="svg-icon svg-icon-info mr-5">
	                <?php echo e(Metronic::getSVG("media/svg/icons/General/Attachment2.svg", "svg-icon-lg")); ?>

	            </span>

	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">The best product</a>
	                <span class="text-muted font-size-sm">Due in 2 Days</span>
	            </div>

	            <span class="font-weight-bolder text-info py-1 font-size-lg">+8%</span>
	        </div>
		</div>
    </div>
</div>
<?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/layout/partials/extras/offcanvas/_quick-user.blade.php ENDPATH**/ ?>