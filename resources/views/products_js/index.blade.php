@extends('layout.default')

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('2461ba2b917f797df8b4', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      
     swal("Product Has Been Deleted !");
        //alert(JSON.stringify(data));
    });


    function playAudio() {
    var x = new Audio(public/media/media.mp3);
    // Show loading animation.
    var playPromise = x.play();
    
    if (playPromise !== undefined) {
    playPromise.then(_ => {
    x.play();.
    })
    .catch(error => {
    });
    
    }
    }
</script>
<script>
    const UserID="{{ Auth::id() }}";
</script>
<script src="{{ asset('js/app.js')}}"></script>

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Products Table
            </h3>
        </div>

    </div>

    <div class="float-xl-left" style="position: relative;
    left: 69pc;"><a href="#" class="btn btn-light-info font-weight-bolder btn-md addProductForm" data-bs-toggle="modal"
            data-bs-target="#addModal">New Product</a>

        <a href="{{ route('trash') }}">
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




                    @foreach ($products as $key=>$product )



                    <tr data-row="5" class="datatable-row datatable-row-even" style="left: 0px;">


                        <td data-field="Order ID" aria-label="54753-003" class="datatable-cell"><span
                                style="width: 126px;">{{ $product->id}}</span></td>



                        <td data-field="Deposit Paid" aria-label="$39286.74" class="datatable-cell"><span
                                style="width: 126px;">{{ $product->getTranslation('name','en') }}
                                <div>

                                    {{ $product->getTranslation('name','ar') }}
                                </div>
                            </span></td>


                        <td data-field="Order ID" aria-label="54753-003" class="datatable-cell">
                            <span style="width: 126px; position: relative;
                             left: -2pc;">{{$product->category->name}}</span>
                        </td>


                        <td>
                            <div class="btn-group" style="position: relative; left:-60px;">
                                <a href="#"
                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 updateProductForm"
                                    data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{ $product->id }}"
                                    data-name_en="{{ $product->getTranslation('name','en') }}"
                                    data-name_ar="{{ $product->getTranslation('name','ar') }}"
                                    data-quantity="{{ $product->quantity }}"
                                    data-price="{{ $product->price }}"
                                    data-description="{{ $product->description }}"
                                    data-is_enabled="{{ $product->is_enabled }}"
                                    data-category_id="{{ $product->category_id }}">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)">
                                                </path>
                                                <path
                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>

                                <form method="POST" action="#">
                                    @csrf
                                    @method('delete')
                                    <button class="btn  deleteProduct" data-id="{{ $product->id }}">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span> </button>
                                </form>



                            </div>

                        </td>


                    </tr>

                    @endforeach

                </tbody>
            </table>




            {{ $products->links() }}

        </div>
        <!--end: Datatable-->
    </div>
</div>


@endsection



@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('products_js.product_js')
@include('products_js.addProduct_js')
@include('products_js.updateProduct_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



@endsection