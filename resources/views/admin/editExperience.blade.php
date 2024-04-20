@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Experience Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/experience/'.$experience->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1">Project</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="project" aria-describedby="emailHelp" value="{{$experience->project}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Role</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="role" aria-describedby="emailHelp" value="{{$experience->role}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Year</label>
        <input type="name" class="form-control" name="year" id="exampleInputPassword1" value="{{$experience->year}}">
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
