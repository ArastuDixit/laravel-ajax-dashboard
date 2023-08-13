<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if(session('success'))
                             <p style="text-align: center; background: #cd3232; font-weight: bold; color: white;">{{session('success')}}</p>
                    @endif

                    @if(session('success-registration'))
                             <p style="text-align: center; background: #32cd37; font-weight: bold; color: white;">{{session('success-registration')}}</p>
                    @endif
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form id="loginForm" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3" style="float: right;text-align: right;" >

                                <a href="{{ route('registration') }}">Create account?</a> <br>
                                {{-- <a href="{{ route('forgot-password') }}">Forgot password?</a> --}}
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(document).ready(function () {
             // Login form submission
             $('#loginForm').on('submit', function (e) {
                 e.preventDefault();
                 let formData = $(this).serialize();

                 $.ajax({
                     url: "{{ route('login') }}",
                     type: "POST",
                     data: formData,
                     success: function (response) {
                         // Handle successful login
                         if (response.success) {
                             // Redirect to dashboard page
                             window.location.href = "{{ route('dashboard') }}";

                         } else {
                             alert('Login failed. Invalid credentials.');
                         }
                     },
                     error: function (xhr, status, error) {
                         // Handle login error
                         alert('An error occurred while trying to log in.');
                     }
                 });
             });
         });
     </script>

</body>
</html>
