@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Transactions</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} Go back to <a href="/home">Dashboard page.</a>
                        </div>
                    @endif
                    
                    <br>
                    <div class="text-right">
                        <a href="{{ action('TransactionsController@create') }}">
                            <button class="btn btn-info">Create new Transaction</button>
                        </a>    
                    </div>
                    <br>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Birthday</th>
                                <th>PIN #</th>
                                <th>Room #</th>
                                <th>Drug</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction['date'] }}</td>
                                    <td>{{ $transaction['patient'] }}</td>
                                    <td>{{ $transaction['birthday'] }}</td>
                                    <td>{{ $transaction['pin_number'] }}</td>
                                    <td>{{ $transaction['room_number'] }}</td>                                    
                                    <td>{{ $transaction['product'] }}</td>
                                    <td>{{ $transaction['quantity'] }}</td>
                                    <td><button onclick="alertUser({{ $transaction['total_price'] }})" class="btn btn-success btn-xs">Transcribe</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function alertUser(totalPrice) {
        alert("The Order is not sent to the pharmacy (Total: PHP"+ totalPrice +")");
    }
</script>
@endsection
