<?php if(config('layout.extras.cart.dropdown.style') == 'light'): ?>
    
    <div class="d-flex align-items-center p-10 rounded-top bg-light">
        <span class="btn btn-md btn-icon bg-light-success mr-4">
            <i class="flaticon2-shopping-cart-1 text-success"></i>
        </span>
        <h4 class="flex-grow-1 m-0 mr-3">My Cart</h4>
        <button type="button" class="btn btn-success btn-sm">2 Items</button>
    </div>
<?php else: ?>
    
    <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('<?php echo e(asset('media/misc/bg-1.jpg')); ?>')">
        <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
            <i class="flaticon2-shopping-cart-1 text-success"></i>
        </span>
        <h4 class="text-white m-0 flex-grow-1 mr-3">My Cart</h4>
        <button type="button" class="btn btn-success btn-sm">2 Items</button>
    </div>
<?php endif; ?>


<div class="scroll scroll-push" data-scroll="true" data-height="250" data-mobile-height="200">
    
    <div class="d-flex align-items-center justify-content-between p-8">
        <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                iBlender
            </a>
            <span class="text-muted">
                Best kichen badge in 2020
            </span>
            <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
                <span class="text-muted mr-1">for</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
                <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
        </div>
        <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="<?php echo e(asset('media/stock-600x400/img-1.jpg')); ?>" title="" alt=""/>
        </a>
    </div>

    
    <div class="separator separator-solid"></div>

    
    <div class="d-flex align-items-center justify-content-between p-8">
        <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                SmartCleaner
            </a>
            <span class="text-muted">
                Smart tool for cooking
            </span>
            <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                <span class="text-muted mr-1">for</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
                <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
        </div>
        <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="<?php echo e(asset('media/stock-600x400/img-2.jpg')); ?>" title="" alt=""/>
        </a>
    </div>

    
    <div class="separator separator-solid"></div>

    
    <div class="d-flex align-items-center justify-content-between p-8">
        <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                CameraX
            </a>
            <span class="text-muted">
                Professional camera
                for edge cutting shots
            </span>
            <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
                <span class="text-muted mr-1">for</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
                <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
        </div>
        <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="<?php echo e(asset('media/stock-600x400/img-3.jpg')); ?>" title="" alt=""/>
        </a>
    </div>

    
    <div class="separator separator-solid"></div>

    
    <div class="d-flex align-items-center justify-content-between p-8">
        <div class="d-flex flex-column mr-2">
            <a href="#" class="font-weight-bold text-dark icon-sm text-hover-primary">
                3DPrinted
            </a>
            <span class="text-muted">
                Manufactoring unique objects
            </span>
            <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 1450</span>
                <span class="text-muted mr-1">for</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs"></i></a>
                <a href="#" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs"></i></a>
            </div>
        </div>
        <a href="#" class="symbol symbol-70 flex-shrink-0">
            <img src="<?php echo e(asset('media/stock-600x400/img-4.jpg')); ?>" title="" alt=""/>
        </a>
    </div>
</div>


<div class="p-8">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
        <span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-7">
        <span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
        <span class="font-weight-bolder text-primary text-right">$5640.00</span>
    </div>
    <div class="text-right">
        <button type="button" class="btn btn-primary text-weight-bold">Place Order</button>
    </div>
</div>
<?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/layout/partials/extras/dropdown/_cart.blade.php ENDPATH**/ ?>