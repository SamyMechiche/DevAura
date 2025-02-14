document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementsByClassName('toggle-button')[0];
    const body = document.body;

    // Vérifier si un mode est déjà enregistré dans localStorage
    const savedMode = localStorage.getItem('theme');
    if (savedMode) {
        body.classList.add(savedMode);
    } else {
        body.classList.add('light-mode'); // Mode par défaut
    }

    toggleButton.addEventListener('click', function () {
        if (body.classList.contains('dark-mode')) {
            body.classList.remove('dark-mode');
            body.classList.add('light-mode');
            localStorage.setItem('theme', 'light-mode');
        } else {
            body.classList.remove('light-mode');
            body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark-mode');
        }
    });
});
