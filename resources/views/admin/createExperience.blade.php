@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add Experience</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('experience.store')}}" enctype="multipart/form-data">
      @csrf 
      @method('post')
      <div class="form-group">
        <label for="exampleInputEmail1">Project</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="project" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Role</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="role" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Year</label>
        <input type="name" class="form-control" name="year" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
