@extends('admin.content')
@section('title', 'About')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">About</div>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Job</th>
        <th scope="col">Country</th>
        <th scope="col">Description</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @csrf
        @foreach ( $abouts as $about)
        <td>{{ $about->id}}</td>
        <td>{{ $about->name}}</td>
        <td>{{ $about->job}}</td>
        <td>{{ $about->country}}</td>
        <td>{{ $about->description}}</td>
        <td>{{ $about->date_of_birth}}</td>
        <td>{{ $about->address}}</td>
        <td>
          <a href="{{ url('/about/'.$about->id.'/edit') }}"><button class="action">Edit</button>
          <button class="action delete-btn" data-url="{{ url('/about/'.$about->id.'/delete') }}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>

@endsection
