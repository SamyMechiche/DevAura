document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggleButton");
    const container = document.querySelector(".container");
    const test = document.getElementsByClassName("test");

    toggleButton.addEventListener("click", () => {
        container.classList.toggle("active");

        // Change le texte du bouton
        if (container.classList.contains("active")) {
            test.textContent = "Rejoignez la communauté de developpeurs passionnés";
            toggleButton.textContent = "J'ai déjà un compte";
        } else {
            test.textContent = "Rejoignez la communauté de developpeurs passionnés";
            toggleButton.textContent = "Je m'inscris →";
        }
    });
});
