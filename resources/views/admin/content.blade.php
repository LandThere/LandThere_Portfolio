<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <!-- CSS -->
    <title>@yield('title', 'Dashboard')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset ('asset/images/lm.png')}}" />
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}" />
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
    @yield('content')
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset ('assets/js/script.js')}}"></script>
</body>

</html>