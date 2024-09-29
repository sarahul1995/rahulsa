// Add smooth scroll functionality for the navigation links
document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        print(targetId);
        const targetElement = document.getElementById(targetId);
      targetElement.scrollIntoView({ behavior: 'smooth' });
    });
});
