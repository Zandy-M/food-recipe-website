function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('show');
}

document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const body = document.body;
    let currentLang = window.location.pathname.split("/")[2] || "en";
    const translations = {
        en: { lightMode: "☀️ Light Mode", darkMode: "🌙 Dark Mode" },
        ar: { lightMode: "☀️ وضع النهار", darkMode: "🌙 الوضع الليلي" }
    };
    function updateToggleText() {
        if (body.classList.contains("dark-mode")) {
            toggleButton.innerText = translations[currentLang].lightMode;
        } else {
            toggleButton.innerText = translations[currentLang].darkMode;
        }
    }
    if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
    }

    updateToggleText();
    toggleButton.addEventListener("click", () => {
        body.classList.toggle("dark-mode");
        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
        } else {
            localStorage.setItem("darkMode", "disabled");
        }
        updateToggleText();
    });
    document.getElementById("languageSwitcher").addEventListener("change", function () {
        currentLang = this.value;
        updateToggleText();
    });
});
