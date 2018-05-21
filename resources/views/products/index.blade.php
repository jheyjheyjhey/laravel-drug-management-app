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
                            {{ session('status') }}
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
                                <th>Name</th>
                                <th>Generic Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drugs as $drug)
                                <tr>
                                    <td>{{ $drug['name'] }}</td>
                                    <td>{{ $drug['generic_name'] }}</td>
                                    <td>{{ $drug['price'] }}</td>
                                    <td>{{ $drug['quantity'] }}</td>
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
