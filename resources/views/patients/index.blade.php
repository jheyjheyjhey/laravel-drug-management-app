@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Patient List</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} Go back to <a href="/home">Dashboard page.</a>
                        </div>
                    @endif
                    
                    <br>
                    <div class="text-right">
                        <a href="{{ action('PatientsController@create') }}">
                            <button class="btn btn-info">Add new Patient</button>
                        </a>
                    </div>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>PIN Number</th>
                                <th>Room / Ward #</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient['name'] }}</td>
                                    <td>{{ $patient['birthday'] }}</td>
                                    <td>{{ $patient['pin_number'] }}</td>
                                    <td>{{ $patient['room_number'] }}</td>
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
