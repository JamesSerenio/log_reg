// Flip to Register
document.getElementById('flip-to-register').addEventListener('click', function() {
    document.querySelector('.flip-card').classList.add('flipped');
});

// Flip to Login
document.getElementById('flip-to-login').addEventListener('click', function() {
    document.querySelector('.flip-card').classList.remove('flipped');
});

