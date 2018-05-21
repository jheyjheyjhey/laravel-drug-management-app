@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add new Transaction</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-danger">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <form role="form" method="POST" action="/transactions">
                                @csrf
                                <div class="form-group">
                                    <label for="patient">Patient Name</label>
                                    <select class="form-control" name="patient" required>
                                        <option value=""></option>
                                        @foreach($patient_list as $patient)
                                            <option value="{{ $patient['patient_id'] }}">{{ $patient['patient_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="drug">Drug</label>
                                    <select class="form-control" name="drug" required>
                                        <option value=""></option>
                                        @foreach($product_list as $product)
                                            <option value="{{ $product['product_id'] }}">{{ $product['product_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" name="qty" required min="1" max="{{ $product['product_qty'] }}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
