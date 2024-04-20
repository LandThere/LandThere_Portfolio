@extends('admin.layout')
@section('title', 'Register')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{route('login')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="" width="180" alt="">
                </a>
                <p class="text-center">Register | CMS Dashboard</p>
                <div class="mt-5">
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
                </div>
                <form action="{{route('register.post')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection