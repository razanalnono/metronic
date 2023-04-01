@extends('layout.default')

@section('content')
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
                                @foreach ($orders as $order )
                                <tr class="font-weight-boldest">
                                    <td class="border-0 pt-7 d-flex align-items-center">
                                        <span class="opacity-80">{{ $order->id }}</span>
                                    </td>
                                    <td class="text-center pt-7 align-middle">
                                        @if(isset($order->cases) && isset($order->cases->case))
                                        <span class="opacity-80">{{ $order->cases->case->name}}</span>
                                        @endif
                                    </td>
                                    <td class="text-right pt-7 align-middle ">
                                        <div class=" flex-col">
                                            <div class="opacity-80">{{$order->created_at->format('Y-m-d ')}}</div>
                                            <div class="opacity-80">{{$order->created_at->format('H:i:s ')}}</div>
                                        </div>
                                    </td>
                                
                                    <td class="text-center pt-7 align-middle">

                                     <span class="opacity-80">{{ isset($order->user) ? $order->user->name : ''}}</span>
                                    </td>

<td class="text-center pt-7 align-middle">

    <span class="opacity-80">{{ isset($order->items) ? count($order->items) : ''}}</span>
</td>
                                    {{-- <td class="text-primary align-items-center pt-7 align-middle "
                                        style="position:relative;">
                                        <div class="flex-root d-flex ">
                                            <div class="opacity-80">
                                            <form action="{{ route('orders.accept', ['order' => $order->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                @if($order->logs)
                                                <button type="submit" class="btn btn-success">Accept Order</button>
                                              @endif
                                            </form>
                                            </div>
                                        </div>
                                    </td> --}}

                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">
                                        <div class="flex-root d-flex ">
                                            <div class="opacity-80">
                                              
                                                <a href="{{ route('orders.show',$order->id) }}"> Show</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">

                                            <div class="flex-root d-flex ">
                                                <div class="opacity-80">
                                                    <form action="{{ route('orders.accept', ['order' => $order->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @if($order->logs)
                                                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="text-primary align-items-center pt-7 align-middle " style="position:relative;">
                                            <div class="flex-root d-flex ">
                                                <div class="opacity-80">
                                                    <form action="{{ route('orders.cancel', ['order' => $order->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                      @if($order->logs()->whereIn('order_cases_id', [2, 6, 7])->exists())
                                                    <button type="submit" class="btn btn-danger btn-sm" disabled>Cancel </button>
                                                    @else
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                    @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    @include('orders.order')
    {{-- @include('orders.update')   --}}
    @endsection