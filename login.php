<?php
session_start();
if (isset($_SESSION['username'])){
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in - RMMFB</title>
    <meta name="description" content="Rental Management and Monitoring for a Fashion Boutique">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
</head>

<body id="content-wrapper">
    <nav class="navbar navbar-expand shadow mb-4 topbar static-top navbar-light">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="/"><span><img src="assets/img/boutique.png" width="60em" alt="">RMMFB</span></a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
    </nav>
    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center d-none d-md-block"><img class="img-fluid w-80" src="assets/img/boutique.png" alt=""></div>
                <div class="col-md-6 text-center d-block d-md-none"><img class="img-fluid mb-3" src="assets/img/user.png" alt=""></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="text-primary underline pb-1"><strong>Login</strong></span></h2>
                    <form action="functions/login.php" method="post" data-bs-theme="light">
                        <div class="mb-3"><input class="form-control shadow" type="text" name="username" placeholder="Username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"></div>
                        <div class="mb-3"><input class="form-control shadow" type="password" name="password" placeholder="Password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"></div>
                        <div class="mb-3">
                            <input class="form-check-input" name="remember" type="checkbox" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                        <div class="mb-1"><button class="btn btn-primary w-100" type="submit">Log in</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/jszip.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/three.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/vanta.birds.min.js"></script>
    <script src="assets/js/vanta.waves.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>