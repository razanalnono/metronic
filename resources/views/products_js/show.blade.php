@extends('layout.default')

@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock
            </h3>
        </div>

    </div>

{{-- Show product variants --}}

    <div class="card card-custom gutter-b">
        <!--begin::Card Body-->
        <div class="card-body d-flex rounded bg-secondary p-12 flex-column flex-md-row flex-lg-column flex-xxl-row">
            <!--begin::Image-->
            <div
                class=" bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-550px">
                <img src="{{asset($product->image) }}" alt="" />
            </div>
            <!--end::Image-->

            <!--begin::Card-->
            <div class="card card-custom w-auto w-md-300px  w-xxl-400px ml-auto">
                <!--begin::Card Body-->
                <div class="card-body px-12 py-10">
                    <h3 class="font-weight-bolder font-size-h2 mb-1"><a href="#" class="text-dark-75"></a>
                        {{ $product->name }}
                    </h3>
                    <br><br>
                    @foreach ($product->productVariants as $variant)
                    @foreach ($variant->att_value as $att_val)
                    <div class="d-flex mb-3">

                        <span style="text-dark-50 flex-root font-weight-bold">{{ $att_val->attribute->name .':'}}
                        </span>
                        <span class="text-dark flex-root font-weight-bold">{{ $att_val->value }}</span>

                        <span class="text-dark flex-root font-weight-bold">{{ $variant->quantity }}</span>
                    </div>
                    @endforeach
                    @endforeach
                    <!--begin::Info-->


                    <div class="d-flex">
                        <span class="text-dark-50 flex-root font-weight-bold">In Stock</span>
                        <span class="text-dark flex-root font-weight-bold">{{ $product->availableQuantity() }}</span>
                        <a href="{{ route('showMove', ['id' => $variant->id]) }}">
                            View
                        </a>

                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Card Body-->
    </div>
    @endsection


    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- @include('stock.stock') 
    @include('stock.create') 
     @include('stock.update') --}}
    @endsection