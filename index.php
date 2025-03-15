<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>" dir="<?php echo ($_SESSION['lang'] == 'ar') ? 'rtl' : 'ltr'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookItUp - Home Page</title>
    <?php require('includes/links.php'); ?>
</head>

<body>
    <?php require('includes/header.php') ?>
    <img class="home-image" src="uploads/home_img.png" alt="Home Image">
    <img class="logo-image" src="uploads/logo_image.png" alt="Logo Image">

    <div class="container">
        <h1><?php echo $lang_data['container-heading']; ?></h1>
        <h2><?php echo $lang_data['container-sub-heading']; ?></h2>
    </div>
    <?php require('includes/footer.php') ?>
</body>

</html>