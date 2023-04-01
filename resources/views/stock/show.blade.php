@extends('layout.default')

@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap bstock-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Stock
            </h3>
        </div>
    
    </div>
 
 <div class="float-xl-left" style="position: absolute;
    left: 69pc;"><a href="#" class="btn btn-light-info font-weight-bolder btn-md updateStockForm"
        data-bs-toggle="modal" data-bs-target="#addModal">Add to Stock</a></div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table  table-hover">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Movements</th>
                
                    </tr>
                </thead><tbody>

                 @foreach ($movements as $movement)
                    <tr>
                        
                        <td>{{ $product->name}}</td>
                        <td>{{ $movement->quantity }}</td>
                        <td>{{ $stock->movement }}</td>
                    </tr>
        </div>

        </td>
        </tr>


        @endforeach

    </tbody>
</table>
<div class="form-group">
<label for="quantity">Quantity Available:</label>
<input type="text" name="quantity" id="quantity" value="{{ $product->availableQuantity() }}" class="form-control"  readonly>
    </div>
    </div>
</div>


</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('stock.stock')     
@include('stock.create')   
@include('stock.update')
@endsection