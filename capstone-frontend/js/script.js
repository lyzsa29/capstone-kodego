function checkUsernameAndRegister() {
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();

    // Check if username already exists
    $.ajax({
        type: 'POST',
        url: 'http://127.0.0.1:8000/api/register-user', // Replace with the actual route for checking username
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
            name: name,
            email: email,
            password: password
    
        }),
        success: function(response) {

            alert(response.message)
            window.location.href = 'login.html';
        },
        error: function() {
            console.error('Failed to check username existence');
            window.location.href = 'register.html';
        }
    });


}

function registerUser(name, email, password, confirmPassword) {
    // Check if password and confirm password match
    if (password !== confirmPassword) {
        alert("Passwords do not match. Please enter matching passwords.");
        return;
    }

    // Register user
    $.ajax({
        type: 'POST',
        url: 'http://127.0.0.1:8000/api/register-user',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
            username: name,
            email: email,
            password: password
        }),
        success: function(response) {
            alert(response.message);
        },
        error: function() {
            console.error('Failed to register user');
        }
    });

}

function loginUser() {
    var name = $('#name').val();
    var password = $('#password').val();

    if (name === 'admin' && password === 'adminpassword') {
        // Redirect to admin.html for administrators
        window.location.href = 'admin-home.html';
    } else {
    
    // Perform user login
    $.ajax({
        type: 'POST',
        url: 'http://127.0.0.1:8000/api/login-user', // Replace with the actual route for user login
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
            name: name,
            password: password
        }),
        success: function(response) {
            alert(response.message);
            window.location.href = 'index-out.html';
        },
        error: function() {
            alert(response.message);
            console.error('Failed to perform user login');
            window.location.href = 'login.html';
        }
     });   
}
}

