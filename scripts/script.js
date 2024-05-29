function handleLoginForm(event) {
    event.preventDefault(); // Prevent default form submission

    // Get form data
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Create AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'server_part/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Handle response
    xhr.onload = function () {
        if (xhr.status === 200) { // Success
            console.log(JSON.parse(xhr.responseText));
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log(response);

                // Login successful: Display message or redirect (implement as needed)
                alert(response.message);
                window.location.reload();
            } else {
                alert(response.message); // Example error message
            }
        } else {
            console.error('Error:', xhr.statusText); // Handle errors
        }
    };

    // Send AJAX request with form data
    xhr.send(`username=${username}&password=${password}`);
}


function handleRegisterForm(event) {
    event.preventDefault(); // Prevent default form submission

    const fullName = document.getElementById('register-form').full_name.value;
    const username = document.getElementById('register-form').username.value;
    const email = document.getElementById('register-form').email.value;
    const password = document.getElementById('register-form').password.value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'server_part/register.php'); // Assuming a separate register.php script for registration
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Registration successful: Display message or redirect (implement as needed)
                alert('Registration successful! Please log in.');
                // Optionally, switch back to the login form after successful registration
            } else {
                alert(response.message); // Display error message from register.php
            }
        } else {
            console.error('Error:', xhr.statusText); // Handle errors
        }
    };

    xhr.send(`full_name=${fullName}&username=${username}&email=${email}&password=${password}`);
}

// Search
const form = document.getElementById('search-form');

form.addEventListener('submit', function (event) {
    event.preventDefault();
    const searchQuery = document.getElementById('search').value;
    window.location.href = 'search.php?query=' + encodeURIComponent(searchQuery);
});


// Page Redirect
function redirectToProductPage(attribute1) {
    var url = "car.php";
    url += "?atr=" + attribute1;
    console.log(url);
    window.location.href = url;
}

const menuToogle = document.getElementById("#menu-toggle");
const menu = document.getElementById("#head-nav");
menuToogle.addEventListener("click", function () {
    if (menu.style.display === "none") {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
});