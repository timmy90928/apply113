document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-links a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            navLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            const targetUrl = this.getAttribute('href');
            window.location.href = targetUrl;
        });
    });
});