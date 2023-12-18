document.addEventListener('DOMContentLoaded', function () {
    // Get the initial position of the navbar
    var navbar = document.getElementById('navbar');
    var navbarOffset = navbar.offsetTop;
    
    // Function to handle the scroll event
    window.addEventListener('scroll', function () {
         // Get the current scroll position
         var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
         // Check if the scroll position is below the initial offset
         if (scrollPosition >= navbarOffset) {
             // Add a class to make the navbar sticky
             navbar.classList.add('sticky');
         } else {
             // Remove the class if the scroll position is above the initial offset
             navbar.classList.remove('sticky');
         }
    
         // Change background color on scroll
         if (scrollPosition > 100) {
             navbar.style.backgroundColor = '#000';
         } else {
             navbar.style.backgroundColor = 'transparent';
         }
    });
    });
    