<?php
session_start();
// Function to check if the admin is logged in
function adminLogin()
{
    if (!isset($_SESSION['admin_id'])) {
        redirect('index.php');
        exit();
    }
}
// Function to show alert message
function alert($message, $type = "success", $delay = 3000)
{
    $alertType = ($type === "success") ? "alert-success" : "alert-danger";
    echo "
    <div class='alert $alertType alert-dismissible fade show custom-alert' role='alert'>
        $message
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    <script>
        setTimeout(() => {
            let alertBox = document.querySelector('.custom-alert');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, $delay);
    </script>
    ";
}
// function for redirection
function redirect($url, $delay = 1000)
{
    echo "
    <script>
        setTimeout(() => {
            window.location.href = '$url';
        }, $delay);
    </script>
    ";
}
