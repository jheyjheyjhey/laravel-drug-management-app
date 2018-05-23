@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Drug Inventory</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} Go back to <a href="/home">Dashboard page.</a>
                        </div>
                    @endif
                    
                    <br>
                    <div class="text-right">
                        <a href="{{ action('ProductsController@create') }}">
                            <button class="btn btn-info">Add new Drug</button>
                        </a>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Generic Name</th>
                                <th>Expiry Date</th>
                                <th>Lot No.</th>
                                <th>Namufacturer</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drugs as $drug)
                                <tr>
                                    <td>{{ $drug['inventory_code'] }}</td>
                                    <td>{{ $drug['generic_name'] }}</td>
                                    <td>{{ $drug['expiry_date'] }}</td>
                                    <td>{{ $drug['lot_number'] }}</td>
                                    <td>{{ $drug['manufacturer'] }}</td>
                                    <td>{{ $drug['price'] }}</td>
                                    <td>{{ $drug['quantity'] }}</td>
                                    <td><a href="/drugs/{{$drug['id']}}/edit"><button class="btn btn-success btn-xs">Edit</button></a></td>
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
