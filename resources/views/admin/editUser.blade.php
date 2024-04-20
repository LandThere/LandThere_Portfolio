@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">User Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/users/'.$user->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Photo</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="{{$user->username}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
