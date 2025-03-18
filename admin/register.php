<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Register</title>
    <?php require('includes/links.php'); ?>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['admin_id'])) {
        redirect('dashboard.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('../includes/db.php');
        include('../includes/functions.php');
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if (empty($username) || empty($email) || empty($password)) {
            alert("All fields are required!", "error");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            alert("Invalid email format!", "error");
        } else {
            // Check if email already exists
            $checkQuery = "SELECT admin_id FROM admins WHERE email = ?";
            if ($stmt = $conn->prepare($checkQuery)) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    alert("Email already registered!", "error");
                } else {
                    // Insert into database
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";
                    if ($stmt = $conn->prepare($query)) {
                        $stmt->bind_param("sss", $username, $email, $hashedPassword);
                        if ($stmt->execute()) {
                            alert("Registration Successful!", "success");
                            redirect("dashboard.php");
                        } else {
                            alert("Error: " . $conn->error, "error");
                        }
                    } else {
                        alert("Error: " . $conn->error, "error");
                    }
                }
            }
        }
    }
    ?>
    <div class="form-container">
        <form action="register.php" method="post" onsubmit="return validateForm()">
            <h2 class="text-center">Admin Registration</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
                <small id="usernameError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <small id="emailError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <small id="passwordError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-custom w-100">Register</button>
            <p class="text-link mt-3">
                Already have an account?
                <a href="index.php" class="redirection-link">Login here</a>
            </p>
        </form>
    </div>
</body>

</html>