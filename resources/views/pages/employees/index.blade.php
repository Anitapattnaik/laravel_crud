@extends('layouts.frontend')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4 text-center">
          @if(session('success'))

          <div class="alert alert-success"> {{ session('success')}}</div>
          @endif

          @if(session('error'))

          <div class="alert alert-danger"> {{ session('error')}}</div>
          @endif
          <div class="card">
            <div class="card-header">
              <h4>Fetch data from the Eloquent model</h4>
              <a href="{{URL::asset('add-employee')}}" class="btn btn-primary float-end">Add Employee</a>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
				
			
                  <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->designation}}</td>
                    <td>{{$employee->status}}</td>
                    <td><a href="{{URL::asset('edit-employee/'.$employee->id)}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{URL::asset('delete-employee/'.$employee->id)}}" class="btn btn-danger">Delete</a></td>
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