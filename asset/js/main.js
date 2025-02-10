document.getElementsByClassName('toggle-button')[0].addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');
});

// Initial mode setup
if (!document.body.classList.contains('dark-mode') && !document.body.classList.contains('light-mode')) {
    document.body.classList.add('light-mode');
}
