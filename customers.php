<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Customers - RMMFBS</title>
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
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Customer Management</h3><button class="btn btn-dark btn-sm d-none d-sm-inline-block" data-bs-toggle="modal" data-bss-tooltip="" data-bs-placement="left" type="button" data-bs-target="#create" title="Here you can create new customer."><i class="fas fa-user-check fa-sm text-white-50"></i>&nbsp;Create Customer</button>
            </div>
            <div class="card shadow my-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Rental List</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Birthdate</th>
                                    <th>Date</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>Email</td>
                                    <td>Date</td>
                                    <td>Date</td>
                                    <td class="text-center"><a data-bs-toggle="tooltip" data-bss-tooltip="" class="mx-1" href="profile.php" title="Here you can see the customer transactions."><i class="far fa-eye text-primary" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" title="Here you can update the customer Information."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" title="Here you can remove the customer."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
                                </tr>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>Email</td>
                                    <td>Date</td>
                                    <td>Date</td>
                                    <td class="text-center"><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="profile.php" data-bs-target="#update" title="Here you can see the customer transactions."><i class="far fa-eye text-primary" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" title="Here you can update the customer Information."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" title="Here you can remove the customer."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Customer</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Fullname</label><input class="form-control" type="text" placeholder="Customer Fullanme" name="name" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Address</label><input class="form-control" type="text" placeholder="Permanent Address" name="item" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Phone</label><input class="form-control" type="text" placeholder="Phone Contact No." name="item" required="" pattern="[0-9]+" minlength="11" maxlength="11"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Email</label><input class="form-control" type="email" placeholder="Email Address" name="item" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Birthdate</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Customer</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Fullname</label><input class="form-control" type="text" placeholder="Customer Fullanme" name="name" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Address</label><input class="form-control" type="text" placeholder="Permanent Address" name="item" pattern="^(?!\s).*$" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Phone</label><input class="form-control" type="text" placeholder="Phone Contact No." name="item" pattern="^(?!\s).*$" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Email</label><input class="form-control" type="email" placeholder="Email Address" name="item" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Birthdate</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="button">Remove</button></div>
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