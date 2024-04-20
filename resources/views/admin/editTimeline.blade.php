@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Timeline Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/timeline/'.$timeline->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1">Course</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="course" aria-describedby="emailHelp" value="{{$timeline->course}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Year</label>
        <input type="name" class="form-control" name="year" id="exampleInputPassword1" value="{{$timeline->year}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">School</label>
        <input type="name" class="form-control" name="school" id="exampleInputPassword1" value="{{$timeline->school}}">
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
