<?php
include_once 'functions/authentication.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customer Profile - RMMFBS</title>
    <meta name="description" content="Rental Management and Monitoring for a Fashion Boutique">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="content">
        <nav class="navbar navbar-expand shadow mb-4 topbar static-top navbar-light" id="nav-animation">
            <div class="container-fluid"><img src="assets/img/boutique.png" width="60em"><a class="navbar-brand d-flex align-items-center" href="/"><span>RMMFB</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link link-dark" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="index.php" title="Here you can see your Dashboard.">Home</a></li>
                        <li class="nav-item"><a class="nav-link link-dark" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="sales.php" title="Here you can see your Sales &amp; Transactions.">Sales</a></li>
                        <li class="nav-item"><a class="nav-link link-dark" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="rents.php" title="Here you can Monitor the rental transactions.">Rentals</a></li>
                        <li class="nav-item"><a class="nav-link link-dark" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="customers.php" title="Here you can manage and view customers.">Customers</a></li>
                        <li class="nav-item"><a class="nav-link link-dark" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="account.php" title="Here you can manage and view customers.">My Account</a></li>
                    </ul><a class="btn btn-light shadow" role="button" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" href="functions/logout.php" title="Here you can logout your acccount.">Logout</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">[CustomerName] - Profile</h3>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>TOTAL SALES</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>TOTAL&nbsp;RETURNED</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-folder-open fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>TOTAL&nbsp;BORROWED</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-folder-open fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-danger fw-bold text-xs mb-1"><span>TOTAL BAD CONDITION</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-thumbs-down fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Transactions</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>Condition</th>
                                    <th>Penalty</th>
                                    <th>Rent Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                    <td>Gown</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>2008/11/28</td>
                                    <td>2008/11/28</td>
                                    <td>Good</td>
                                    <td>$162,700</td>
                                    <td>$162,700</td>
                                    <td>Returned</td>
                                </tr>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                    <td>Shirt</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>2009/10/09</td>
                                    <td>2009/10/09</td>
                                    <td>Very Bad</td>
                                    <td>$1,200,000</td>
                                    <td>$1,200,000</td>
                                    <td>Returned</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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