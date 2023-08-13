<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('registration') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                   <span class="text-danger">{{ $errors->first('name') }}</span>
                                   @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
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
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group mb-3" style=" float: right; " ><a href="{{ route('login') }}">Already have account?</a></div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Register</button>
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
            // Registration form submission
            $('#registrationForm').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('registration') }}",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        // Handle successful registration
                        if (response.success) {
                            alert(response.message);
                            // Redirect or perform other actions as needed
                        } else {
                            alert('Registration failed. Please check your form data.');
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle registration error
                        alert('An error occurred while trying to register.');
                    }
                });
            });
        });
    </script>

</body>
</html>
