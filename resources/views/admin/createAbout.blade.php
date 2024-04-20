@extends('admin.content')
@section('title', 'Create')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Add About</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{route('about.store')}}"  enctype="multipart/form-data">
      @csrf 
      @method('post')
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea type="name" class="form-control" name="description" id="exampleInputPassword1"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Date of Birth</label>
        <input type="name" class="form-control" name="date_of_birth" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="name" class="form-control" name="address" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">ZIP Code</label>
        <input type="name" class="form-control" name="zip_code" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Curriculum Vitae</label>
        <input type="file" class="form-control" aria-describedby="emailHelp" name="cv">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection
