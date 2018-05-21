@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <div class="row">
                            <!-- Number of Patients On-Process -->
                            <div class="col-sm-6">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-body text-center">
                                        <h2 class="display-2">{{ $patient_count }}</h2>
                                        <h2>Patient(s)</h2>
                                        <hr>
                                        <a href="{{ action('PatientsController@create') }}">
                                            <button class="btn btn-default">Add Patient</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product On-stock -->
                            <div class="col-sm-6">
                                <div class="card card text-white bg-success mb-3">
                                    <div class="card-body text-center">
                                        <h2 class="display-2">{{ $drug_count }}</h2>
                                        <h2>Drug(s) on Stock</h2>
                                        <hr>
                                        <a href="{{ action('ProductsController@create') }}">
                                            <button class="btn btn-default">Add Drug</button>
                                        </a>                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Transactions -->
                            <div class="col-sm-12">
                                <div class="card card text-white bg-dark mb-3">
                                    <div class="card-body text-center">
                                        <h2 class="display-2">{{ $drug_count }}</h2>
                                        <h2>Total Transaction(s)</h2>
                                        <hr>
                                        <a href="{{ action('ProductsController@create') }}">
                                            <button class="btn btn-default">View Transactions</button>
                                        </a>                                        
                                        <a href="{{ action('ProductsController@create') }}">
                                            <button class="btn btn-default">Create new Transaction</button>
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
