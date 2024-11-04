// Flip to Register
document.getElementById('flip-to-register').addEventListener('click', function() {
    document.querySelector('.flip-card').classList.add('flipped');
});

// Flip to Login
document.getElementById('flip-to-login').addEventListener('click', function() {
    document.querySelector('.flip-card').classList.remove('flipped');
});

// Handle modal
var modal = document.getElementById("successModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Close modal when clicked outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Check if 'registered=success' is in the URL to show the modal automatically after registration
if (window.location.search.includes('registered=success')) {
    modal.style.display = "block";
    document.querySelector('.flip-card').classList.remove('flipped');
}

