@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">About Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/about/'.$about->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{$about->name}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Job</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="job" aria-describedby="emailHelp" value="{{$about->job}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Country</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="country" aria-describedby="emailHelp" value="{{$about->country}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="name" class="form-control" name="description" id="exampleInputPassword1" value="{{$about->description}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Date of Birth</label>
        <input type="name" class="form-control" name="date_of_birth" id="exampleInputPassword1" value="{{$about->date_of_birth}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="name" class="form-control" name="address" id="exampleInputPassword1" value="{{$about->address}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">ZIP Code</label>
        <input type="name" class="form-control" name="zip_code" id="exampleInputPassword1" value="{{$about->zip_code}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">CV</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="cv">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
