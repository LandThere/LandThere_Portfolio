@extends('admin.layout')
@section('title', 'Login')
@section('content')
<div class="container">
  <input type="checkbox" id="check">
  <div class="login form">
    <a href="{{route('login')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
      <img src="{{ asset('asset/images/lm.png') }}" width="180" alt="" style="margin-left: 90px">
    </a>
    <header>Login</header>
    @if($errors->any())
    <div class="col-12">
      @foreach($errors->all() as $error)
      <div class="alert alert-danger">{{$error}}</div>
      @endforeach
    </div>
    @endif

    @if(session()->has('error'))
      <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <form action="{{route('login.post')}}" method="post">
      @csrf
      <input type="text" placeholder="Enter your username" name="username">
      <input type="password" placeholder="Enter your password" name="password">
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</div>
@endsection