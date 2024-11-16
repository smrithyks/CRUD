<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h2 class="text-center my-5">Login</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="<?php echo site_url('auth/validate_login'); ?>" class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" required><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required><br>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

                <p class="text-center mt-3">
                    Don't have an account? <a href="#registerForm" id="showRegisterForm" class="btn btn-link">Register</a>
                </p>
            </div>
        </div>

        <div id="registerForm" style="display:none;">
            <h2 class="text-center my-5">Register</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form method="post" action="<?php echo site_url('auth/register'); ?>" class="form-group">
                        <label for="new_username">Username:</label>
                        <input type="text" name="new_username" id="new_username" class="form-control" required><br>

                        <label for="new_email">Email:</label>
                        <input type="email" name="new_email" id="new_email" class="form-control" required><br>

                        <label for="new_password">Password:</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required><br>

                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required><br>

                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('showRegisterForm').addEventListener('click', function(event) {
            event.preventDefault(); 
            document.querySelector('#registerForm').style.display = 'block'; 
        });
    </script>
</body>

</html>
