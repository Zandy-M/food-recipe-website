<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <?php require('includes/links.php'); ?>
</head>

<body>
    <?php
    if (isset($_SESSION['admin_id'])) {
        redirect('dashboard.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('../includes/db.php');
        include('../includes/functions.php');
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($username) || empty($password)) {
            alert("All fields are required!", "error");
        } else {
            $query = "SELECT admin_id, username, password FROM admins WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $stored_username, $stored_password);
                $stmt->fetch();
                if (password_verify($password, $stored_password)) {
                    $_SESSION['admin_id'] = $id;
                    $_SESSION['username'] = $stored_username;
                    alert("Login Successfully", "success");
                    redirect('dashboard.php');
                } else {
                    alert("Incorrect password.", "error");
                }
            } else {
                alert("Username not found.", "error");
            }
            $stmt->close();
        }
    }
    ?>
    <div class="form-container">
        <form action="index.php" method="post" onsubmit="return validateLoginForm()">
            <h2 class="text-center">Admin Login</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
                <small id="usernameError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <small id="passwordError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
            <p class="text-link mt-3">
                Don't have an account?
                <a href="register.php" class="redirection-link">Register here</a>
            </p>
        </form>
    </div>
</body>

</html>