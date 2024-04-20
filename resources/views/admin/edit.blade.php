@extends('admin.content')
@section('title', 'Edit')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Dashboard</div>
  <div class="container">
    <form class="custom-form" method="post" action="{{ route('website.update', ['website' => $website]) }}">
      @csrf 
      @method('put')
      <div class="form-group">
        <label for="exampleInputPassword1">Instagram</label>
        <input type="name" class="form-control" name="instagram" id="exampleInputPassword1" value="{{$website->instagram}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Twitter</label>
        <input type="name" class="form-control" name="twitter" id="exampleInputPassword1" value="{{$website->twitter}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Facebook</label>
        <input type="name" class="form-control" name="facebook" id="exampleInputPassword1" value="{{$website->facebook}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Github</label>
        <input type="name" class="form-control" name="github" id="exampleInputPassword1" value="{{$website->github}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>
@endsection