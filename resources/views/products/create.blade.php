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
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <form role="form" method="POST" action="/drugs">
                                @csrf
                                <div class="form-group">
                                    <label for="drug_name">Name</label>
                                    <input type="text" class="form-control" name="drug_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="generic_name">Generic Name</label>
                                    <input type="text" class="form-control" name="generic_name" required>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label for="drug_code">Code</label>
                                    <input type="text" class="form-control" name="drug_code" required>
                                </div> -->

                                <div class="form-group">
                                    <label for="drug_price">Price</label>
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
