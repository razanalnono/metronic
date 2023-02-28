<x-front-layout title="Checkout">
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    {{-- <form method="post" action="{{ route('checkout') }}" class="">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="addr[shipping][first_name]" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="addr[shipping][last_name]" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="addr[shipping][email]" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="addr[shipping][phone_number]" required>
                        </div>
                        <div class="form-group">
                            <label for="street_address">Street Address</label>
                            <input type="text" name="addr[shipping][street_address]" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="addr[shipping][city]" required>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" name="addr[shipping][postal_code]" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="addr[shipping][state]" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                            <input type="text" name="addr[shipping][country]" required>
                        </div>
                        <button type="submit">Submit</button>
                    </form> --}}


                            <form method="post" action="{{ route('checkout') }}">
                                @csrf
                                <div class=" col-lg-12">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Checkout</h5>

                                        </div>
                                        <div class="modal-body row col-lg-12">

                                            <div class="form-group col-md-6">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][first_name]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="addr[shipping][last_name]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="addr[shipping][email]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][phone_number]" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="street_address">Street Address</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][street_address]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="addr[shipping][city]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" name="addr[shipping][country]"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="postal_code">Postal Code</label>
                                                <input type="text" class="form-control"
                                                    name="addr[shipping][postal_code]" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" name="addr[shipping][state]"
                                                    required>
                                            </div>





                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                </div>
                <div class="col-xl-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ $cart->total() }}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.50</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">$10.00</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ $cart->total() }}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>