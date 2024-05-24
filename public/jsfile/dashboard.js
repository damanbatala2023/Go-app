const navbarToggle = document.getElementById('navbar-toggle');
const navbarMenu = document.querySelector('.navbar-menu');

navbarToggle.addEventListener('click', () => {
    navbarMenu.classList.toggle('active');
});


// Get the logout link element
const logoutLink = document.getElementById('logout');

// Add click event listener to the logout link
logoutLink.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior

    // Send a POST request to the logout route
    axios.post('/logoutbn', {}, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        // Redirect the user to the login page
        window.location.href = '/';
    })
    .catch(error => {
        console.error(error);
        // Handle any errors that occurred during the logout process
    });
});