@extends('layouts.frontend')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Employee</h4>
                    <a href="{{URL::asset('/employees')}}" class="btn btn-danger float-end">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{URL::asset('store-employee')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name." value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email." value="{{old('email')}}">
                             @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your mobile." value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Designation:</label>
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter your designation." value="{{old('designation')}}">
                            @if ($errors->has('designation'))
                                <span class="text-danger">{{ $errors->first('designation') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                        <label for="">Select Profile:</label>
                            <input type="file" name="file" class="custom-file-input form-control" id="chooseFile">
                          
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