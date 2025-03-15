<nav class="navbar">
    <button id="dark-mode-toggle" class="btn btn-outline-secondary ml-3"><?php echo $lang_data['dark-mode']; ?></button>
    <div class="hamburger" onclick="toggleMenu();">
        <i class="bi bi-list"></i>
    </div>
    <ul class="menu" id="menu">
        <li><a class="nav-link" href="/<?php echo $_SESSION['lang']; ?>"><?php echo $lang_data['home']; ?></a></li>
        <li><a class="nav-link" href="#"><?php echo $lang_data['recipes']; ?></a></li>
        <li><a class="nav-link" href="#"><?php echo $lang_data['cooking-tips']; ?></a></li>
        <li><a class="nav-link" href="#"><?php echo $lang_data['about-us']; ?></a></li>
    </ul>
    <div class="d-flex justify-content-end ml-auto">
        <select id="languageSwitcher">
            <option value="en" <?php echo ($_SESSION['lang'] == 'en') ? 'selected' : ''; ?>>English</option>
            <option value="ar" <?php echo ($_SESSION['lang'] == 'ar') ? 'selected' : ''; ?>>عربي</option>
        </select>
    </div>
</nav>
<script>
    document.getElementById('languageSwitcher').addEventListener('change', function() {
        var selectedLang = this.value;
        var currentUrl = window.location.origin + "/CookItUp/" + selectedLang;
        window.location.href = currentUrl;
    });
</script>