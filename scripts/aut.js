$(document).ready(function () {
    $("#login-form").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission
        var username = $("#username").val();
        var password = $("#password").val();

        // AJAX call to the server for authorization
        $.ajax({
            type: "POST",
            url: "login.php", // PHP script handling authorization
            data: {
                username: username,
                password: password
            },
            success: function (response) {
                // Handle server response
                $("#login-message").html(response);
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                $("#login-message").text("Error: " + error);
            }
        });
    });
});