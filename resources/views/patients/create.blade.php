@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add new Patient</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} Go back to <a href="/home">Dashboard page.</a>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <form role="form" method="POST" action="/patients">
                                @csrf
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>                                

                                <div class="form-group">
                                    <label for="middle_name">Last Name</label>
                                    <input type="text" class="form-control" name="middle_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control" name="birthday" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pin_number">PIN Number</label>
                                    <input type="text" class="form-control" name="pin_number" required>
                                </div>

                                <div class="form-group">
                                    <label for="room_number">Room / Ward #</label>
                                    <input type="text" class="form-control" name="room_number" required>
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
