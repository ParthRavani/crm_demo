@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <div class="row">
        <div class="col-10">
            <h4 class="display-3">Employee</h4>
        </div>
        <div class="col-2 text-center ">
            <br>
        <a class="btn" style="background-color: lightgray" href="{{route('employees.create')}}">Add</a>
        </div>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Company</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->company_id}}</td>
            <td>{{$employee->first_name}} {{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td>
                <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
