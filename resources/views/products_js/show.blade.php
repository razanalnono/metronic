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


    <div class="card card-custom">
    


        <div class="card-body">
            <div class="table-responsive">

                <table class="table  table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Variant</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Movement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->productVariants as $variant)
                        <tr>
                            <td>{{ $variant->id }}</td>

                            <td>
                                @foreach ($variant->att_value as $att_val)
                                <div class="d-flex mb-3">

                                    <span style="text-dark-50 flex-root font-weight-bold">{{ $att_val->attribute->name
                                        .':'}}
                                    </span>
                                    <span class="text-dark flex-root font-weight-bold">{{ $att_val->value }}</span>

                                </div>
                                @endforeach
                            </td>

                            <td>
                                <span class="text-dark flex-root font-weight-bold">{{ $variant->price }}</span>
                            </td>
                            <td>
                                <span class="text-dark flex-root font-weight-bold">{{ $variant->quantity }}</span>
                            </td>




                            <td data-field="Status" aria-label="4" class="datatable-cell">
                                <span>
                                    {{ $productVariants->movement }}
                                     </span>
                            </td>



                            </td>
            </div>

            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>


</div>

@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection