<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="login-container">
        <div class="image-section">
            <img src="assets/img/DZCM.png" alt="Logo" class="logo">
        </div>
        <div class="login-section">
            <div class="home-button">
                <a href="../index.php"><i class="fas fa-arrow-left"></i> Home</a>
            </div>
            <h1>Welcome</h1>
            <p>Log in to your account to continue</p>
            <form id="loginForm" method="post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="••••••••••••••" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>
                <button id="login" type="submit" class="login-button">Log In</button>
            </form>

            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const loginButton = document.getElementById('login');

            loginButton.disabled = true;
            loginButton.textContent = 'Logging in...';

            fetch('includes/handler.php?action=login', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Raw response:', response);

                    if (!response.ok) {
                        console.error('Response status:', response.status);
                        console.error('Response statusText:', response.statusText);

                        return response.text().then(errorText => {
                            console.error('Response text:', errorText);
                            throw new Error(`HTTP error! status: ${response.status}, text: ${errorText}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = data.redirect;
                    } else {
                        alert(data.message);
                        loginButton.disabled = false;
                        loginButton.textContent = 'Log In';
                    }
                })
                .catch(error => {
                    console.error('Full Fetch Error:', error);

                    if (error instanceof TypeError) {
                        alert('Network error or invalid JSON response. Please check your connection.');
                    } else {
                        alert('Login failed. Please try again or contact support.');
                    }

                    loginButton.disabled = false;
                    loginButton.textContent = 'Log In';
                });
        });
        /*document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const loginButton = document.getElementById('login');

            // Disable button and show loading state
            loginButton.disabled = true;
            loginButton.textContent = 'Logging in...';

            fetch({
                    url: 'includes/process.php?action=login',
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = data.redirect;
                    } else {
                        alert(data.message);
                        loginButton.disabled = false;
                        loginButton.textContent = 'Log In';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An unexpected error occurred. Please try again.');
                    loginButton.disabled = false;
                    loginButton.textContent = 'Log In';
                });
        });*/

        /*$('#loginForm').submit(function(e){
        		e.preventDefault()
        		$('#loginForm button[id="login"]').attr('disabled',true).html('Logging In...');
        		if($(this).find('.alert-danger').length > 0 )
        			$(this).find('.alert-danger').remove();		
        		$.ajax({
        			url:'includes/process.php?action=login',
        			method:'POST',
        			data:$(this).serialize(),
        			error:err=>{
        				console.log(err)
        			},
        			success:function(resp){
        				if(resp == 1){
        					$('#login-form').prepend('<div class="alert alert-success">Log in success</div>')
        					location.reload('index.php?page=dashboard');
        				}else{
        					$('#login-form').prepend('<div class="alert alert-danger">Incorrect Credentials</div>')
        					$('#login-form button[id="login"]').removeAttr('disabled').html('Login In')
        				}
        			}
        		})
        	})*/
    </script>
</body>

</html>