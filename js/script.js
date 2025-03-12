function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show');
}

document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const body = document.body;

    // Check if dark mode was previously enabled
    if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
        toggleButton.innerText = "☀️ Light Mode";
    }

    toggleButton.addEventListener("click", () => {
        body.classList.toggle("dark-mode");

        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            toggleButton.innerText = "☀️ Light Mode";
        } else {
            localStorage.setItem("darkMode", "disabled");
            toggleButton.innerText = "🌙 Dark Mode";
        }
    });
});
