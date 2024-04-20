@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add Skills</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('skill.store')}}" enctype="multipart/form-data">
      @csrf 
      @method('post')
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
        <input type="name" class="form-control" name="experience" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="name" class="form-control" name="name" id="exampleInputPassword1">
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
