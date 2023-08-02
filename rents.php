<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rentals - RMMFBS</title>
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
                <h3 class="text-dark mb-0">Rental Management</h3><button class="btn btn-dark btn-sm d-none d-sm-inline-block" data-bs-toggle="modal" data-bss-tooltip="" data-bs-placement="left" type="button" data-bs-target="#create" title="Here you can create new transaction."><i class="fas fa-user-check fa-sm text-white-50"></i>&nbsp;Create Transaction</button>
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
                                    <th>Item</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>Rent Price</th>
                                    <th>Status</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                    <td>Gown</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>2008/11/28 - 2008/11/29</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                    <td>Not yet returned</td>
                                    <td class="text-center"><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" title="Here you can update the transaction status." href="#" data-bs-target="#return"><i class="far fa-check-circle" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" title="Here you can update the transaction details."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" title="Here you can remove the transaction."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
                                </tr>
                                <tr class="table-warning">
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                    <td>Shirt</td>
                                    <td>000000000000</td>
                                    <td>Address</td>
                                    <td>2009/10/09</td>
                                    <td>2009/10/09</td>
                                    <td>$1,200,000</td>
                                    <td>1 Day Late</td>
                                    <td class="text-center"><a data-bs-toggle="tooltip" data-bss-tooltip="" class="mx-1" title="Here you can update the transaction status." href="#"><i class="far fa-check-circle" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" title="Here you can update the transaction details."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" title="Here you can remove the transaction."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
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
                    <h4 class="modal-title">Create Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Customer</label><select class="form-select" name="id">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
                        <div style="margin-top: 5px;"><label class="form-label">Item</label><input class="form-control" type="text" placeholder="Item" name="item" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Price</label><input class="form-control" type="number" placeholder="Price" name="price" required="" value="0"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
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
                    <h4 class="modal-title">Update Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Item</label><input class="form-control" type="text" placeholder="Item" name="item" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Price</label><input class="form-control" type="number" placeholder="Price" name="price" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
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
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="return">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Return Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Item Condition</label><select class="form-select" required="">
                                <optgroup label="Conditions">
                                    <option value="1" selected="">Good Condition</option>
                                    <option value="2">Bad Condition</option>
                                    <option value="3">Very Bad Condition</option>
                                    <option value="4">Missing</option>
                                </optgroup>
                            </select></div>
                        <div style="margin-top: 5px;"><label class="form-label">Penalty</label><input class="form-control" type="number" name="penalty" value="0" required=""></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
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