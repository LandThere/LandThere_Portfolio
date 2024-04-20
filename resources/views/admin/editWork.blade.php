@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Works Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/work/'.$work->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1">Project Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{$work->name}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="name" class="form-control" name="description" id="exampleInputPassword1" value="{{$work->description}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Link</label>
        <input type="name" class="form-control" name="link" id="exampleInputPassword1" value="{{$work->link}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Github</label>
        <input type="name" class="form-control" name="github" id="exampleInputPassword1" value="{{$work->github}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
