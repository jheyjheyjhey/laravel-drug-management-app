@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add new Drug</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                             {{ session('status') }} Go back to <a href="/home">Dashboard page.</a>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <form role="form" method="POST" action="/drugs">
                                @csrf

                                <div class="form-group">
                                    <label for="drug_code">Inventory Code</label>
                                    <input type="text" class="form-control" name="drug_code" required>
                                </div>

                                <div class="form-group">
                                    <label for="generic_name">Drug</label>
                                    <input type="text" class="form-control" name="generic_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date" required>
                                </div>

                                <div class="form-group">
                                    <label for="lot_number">Lot No.</label>
                                    <input type="text" class="form-control" name="lot_number" required>
                                </div>

                                <div class="form-group">
                                    <label for="manufacturer">Manufacturer</label>
                                    <input type="text" class="form-control" name="manufacturer" required>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="drug_name">Name</label>
                                    <input type="text" class="form-control" name="drug_name" required>
                                </div> -->

                                <div class="form-group">
                                    <label for="drug_price">Unit Price</label>
                                    <input type="text" class="form-control" name="drug_price" required>
                                </div>

                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" name="qty" required>
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
