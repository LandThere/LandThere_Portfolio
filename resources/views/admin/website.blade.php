@extends('admin.content')
@section('title', 'Website Information')
@section('content')
@include('admin.navbar')
<section class="home-section">
  <div class="text">Socials</div>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Instagram</th>
        <th scope="col">Twitter</th>
        <th scope="col">Facebook</th>
        <th scope="col">Github</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @csrf
        @foreach ( $websites as $website)
        <td>{{ $website->id}}</td>
        <td>{{ $website->instagram}}</td>
        <td>{{ $website->twitter}}</td>
        <td>{{ $website->facebook}}</td>
        <td>{{ $website->github}}</td>
        <td>
          <a href="{{route('website.edit', ['website' => $website])}}"><button class="action">Edit</button>
          <button class="action delete-btn" data-url="{{ url('/website/'.$website->id.'/delete') }}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Handle click event for delete button
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      
      const url = this.getAttribute('data-url');
      
      // Show confirmation dialog
      Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this data!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to delete URL
          window.location.href = url;
        }
      });
    });
  });
</script>
@endsection
