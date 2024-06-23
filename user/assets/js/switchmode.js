// Custom script for Light / Dark Mode
document.getElementById('navbar-toggler').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});

function myFunction() {
    var element = document.body;
    element.dataset.bsTheme =
        element.dataset.bsTheme == "light" ? "dark" : "light";
}