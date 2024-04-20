@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add Work</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('work.store')}}" enctype="multipart/form-data">
      @csrf
      @method('post')
      <div class="form-group">
        <label for="exampleInputEmail1">Project Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea type="name" class="form-control" name="description" id="exampleInputPassword1"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Link</label>
        <input type="name" class="form-control" name="link" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Github</label>
        <input type="name" class="form-control" name="github" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
