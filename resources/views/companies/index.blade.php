@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <div class="row">
        <div class="col-10">
            <h4 class="display-3">Companies</h4>
        </div>
        <div class="col-2 text-center ">
            <br>
        <a class="btn" style="background-color: lightgray" href="{{route('companies.create')}}">Add</a>
        </div>
    </div>

    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Website</td>
          <td>Logo</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td><img class="img-fluid" style="width: 100px" src="{{ asset('storage/'.$company->logo)}}" alt="" srcset=""></td>
            <td>
                <a href="{{ route('companies.edit',$company->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
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
