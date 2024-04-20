@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Skills Edit</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ url('/skill/'.$skill->id.'/update') }}" enctype="multipart/form-data">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputEmail1">Skill</label>
        <select class="form-select" id="exampleInputEmail1" aria-describedby="emailHelp" name="skill">
          <option value="Front End">Front-End</option>
          <option value="Back End">Back-End</option>
          <option value="Others">Others</option>
      </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Experience</label>
        <input type="name" class="form-control" name="experience" id="exampleInputPassword1" value="{{$skill->experience}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="name" class="form-control" name="name" id="exampleInputPassword1" value="{{$skill->name}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
