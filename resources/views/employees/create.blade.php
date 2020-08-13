@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add an employee</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      @php
          $Companies = \App\Models\Company::all();
      @endphp

     @if (count($Companies))
     <form method="post" action="{{ route('employees.store') }}">
        @csrf
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select class="form-control" name="company_id" id="cars">
                @foreach ($Companies as $Company)
                <option class="form-control" value="{{$Company->id}}">{{$Company->name}}</option>
                @endforeach
              </select>
            {{-- <input type="text" class="form-control" name="company_id"/> --}}
        </div>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name"/>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name"/>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone"/>
        </div>
        <button type="submit" style="background-color: lightgray" class="btn btn-primary-outline">Add Employee</button>
    </form>
    @else
    {{ __('Plase add Company first!') }}
    @endif
  </div>
</div>
</div>
@endsection
