@extends('layout.default')
@section('content')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 font-weight-boldest mb-10">ORDER DETAILS</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5">
                                <img src="/metronic/theme/html/demo1/dist/assets/media/logos/logo-dark.png" alt="">
                            </a>
                            <!--end::Logo-->
                            <span class=" d-flex flex-column align-items-md-end opacity-70">
                                <span>{{ config('app.name','Selsela Store') }}</span>
                                <span>Gaza-Palestine</span>
                            </span>
                        </div>
                    </div>
                    <div class="border-bottom w-100"></div>
                    <div class="d-flex justify-content-between pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">ORDER DATE</span>
                            <span class="opacity-70">{{$order->created_at->format('Y-m-d')}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">ORDER NO.</span>
                            <span class="opacity-70">{{ $order->id }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">DELIVERED TO.</span>
                            <span class="opacity-70">Iris Watson, P.O. Box 283 8562 Fusce RD.<br>Fredrick Nebraska
                                20620</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->

            <!-- begin: Invoice body-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted  text-uppercase">Ordered Items</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $total=0;
                                @endphp
                                @foreach ($detail_item as $detail) 

                                <tr class="font-weight-boldest border-bottom-0">
                                    <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                            <div class="symbol-label"
                                                style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/products/2.png')">
                                                <img src="{{ $detail->image }}" />
                                            </div>
                                        
                                        </div>
                                        <!--end::Symbol-->
                                        {{ json_decode($detail->name)->en }}
                                    </td>


                                    <!-- your code here -->
                                    <td class="border-top-0 text-right py-4 align-middle">{{ $detail->quantity }}</td>
                                    <td class="border-top-0 text-right py-4 align-middle">{{ $detail->price }}</td>
                                    @php
                                    $subtotal = $detail->quantity * $detail->price;
                                    @endphp
                                    <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">{{$subtotal
                                        }}</td>

                                </tr>
                                @php
                                $total+=$subtotal;

                                @endphp

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: Invoice body-->

            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-muted  text-uppercase">PAYMENT TYPE</th>
                                    <th class="font-weight-bold text-muted  text-uppercase">PAYMENT STATUS</th>
                                    <th class="font-weight-bold text-muted  text-uppercase">PAYMENT DATE</th>
                                    <th class="font-weight-bold text-muted  text-uppercase text-right">TOTAL PAID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="font-weight-bolder">
                                    <td>{{ $order->payment_type->name ?? "UNPAID" }}</td>
                                    <td>Jan 07, 2020</td>
                                    <td>Jan 07, 2020</td>
                                    <td class="text-primary font-size-h3 font-weight-boldest text-right">{{ $total ??"0"
                                        }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->

            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            onclick="window.print();">Download Order Details</button>
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print
                            Order Details</button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->

            <!-- end: Invoice-->
        </div>
    </div>
    <!--end::Card-->
</div>


@endsection