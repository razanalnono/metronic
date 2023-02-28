<x-front-layout title="Cart">

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        {{-- <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li> --}}
                        <li><a href="{{ route('add.product') }}">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="d-flex" style="position:absolute; right:110px; top:30px;">
            <p class=" btn btn-border-outline ml-5"><a href="{{ route('checkout')}}"> Shop Now</a></p>
        </div>
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="">Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach ($cart->get() as $item)
                <!-- Cart Single List list -->
                <div class="cart-single-list" id="{{ $item->id }}">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="{{ route('products.show', $item->product->id) }}">
                                <img src="{{($item->product->image) }}" alt="Product Image">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="{{ route('products.show', $item->product->slug) }}">
                                    {{ $item->product->name }}</a></h5>
                            <p class="product-des">
                                <span><em>Category:</em> {{ $item->product->category->name }}</span>
                                {{-- <span><em>Size:</em>{{
                                    \App\Models\VariationValue::find($item->variation_value)->value }}</span> --}}
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <input class="form-control item-quantity" data-id="{{ $item->id }}"
                                    value="{{ $item->quantity }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="text-center">{{ $item->option->variation->price * $item->quantity }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            00
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" data-id="{{ $item->id }}" href="javascript:void(0)"><i
                                    class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single List list -->
                @endforeach
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->


    @push('scripts')
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    @endpush
</x-front-layout>