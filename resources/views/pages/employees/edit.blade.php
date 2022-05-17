@extends('layouts.frontend')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee</h4>
                    <a href="{{URL::asset('/employees')}}" class="btn btn-danger float-end">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{URL::asset('update-employee/'.$employee->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name." value="{{ $employee->name}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email." value="{{ $employee->email}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your mobile." value="{{ $employee->phone}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Designation:</label>
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter your designation." value="{{ $employee->designation}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status:</label>
                            <input type="checkbox" name="status" id="status" placeholder="Enter your designation." {{$employee->status == 1 ? 'checked' : '' }}> Inactive/Active
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection