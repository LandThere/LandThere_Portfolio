@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add Timeline</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('timeline.store')}}" enctype="multipart/form-data">
      @csrf 
      @method('post')
      <div class="form-group">
        <label for="exampleInputEmail1">Course</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="course" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Year</label>
        <input type="name" class="form-control" name="year" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">School</label>
        <input type="name" class="form-control" name="school" id="exampleInputPassword1">
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
