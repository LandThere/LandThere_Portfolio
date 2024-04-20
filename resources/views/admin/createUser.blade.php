@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add User</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
      @csrf 
      @method('post')
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Photo</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
