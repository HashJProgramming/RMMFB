<?php
include_once 'functions/authentication.php';
include_once 'functions/connection.php';
$id = $_GET['id'];

$sql = "SELECT SUM(r.price) AS total, c.fullname 
FROM transactions t
JOIN rentals r ON t.id = r.transact_id
JOIN customers c ON t.customer_id = c.id
WHERE t.id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
$result = $statement->fetch();

$total = $result['total'];
$customer = $result['fullname'];

function getItems(){
    global $id;
    global $db;
    $sql = "SELECT c.fullname, r.price, r.returned, r.qty, i.name, r.created_at
    FROM transactions t
    JOIN customers c ON t.customer_id = c.id
    JOIN rentals r ON t.id = r.transact_id
    JOIN inventory i ON r.item_id = i.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $items = $statement->fetchAll();
    foreach($items as $row){
        $startDateObj = new DateTime($row['created_at']);
        $endDateObj = new DateTime($row['returned']);
        $interval = $startDateObj->diff($endDateObj);
        $days = $interval->days;
        ?>
            <tr class="font-monospace" style="font-size: 5px;">
                <td class="font-monospace">ITEM:&nbsp;<strong><?php echo $row['name'] ?></strong></td>
                <td class="font-monospace text-end" >Qty<?php echo $row['qty'] ?></td>
                <td class="font-monospace text-center"><?php echo $days ?>Days</td>
                <td class="font-monospace text-end"><strong>₱<?php echo $row['price'] ?></strong></td>
            </tr>
        <?php
    }
}


?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RMMFB</title>
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
<body>
<!-- <body onload="printPageAndRedirect()"> -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="font-monospace text-center" style="color: var(--bs-gray-900);font-size: 7px;">
                    <img src="assets/img/boutique.png" width="30">
                    <span style="font-weight: normal !important;">Fashion Boutique</span><br>
                    <span style="font-weight: normal !important;">Cabera Street St. Barangay Balangasan, Pagadian City</span><br>
                    <span style="font-weight: normal !important;">Phone (+63) 970-081-2044</span><br>
                    <span style="font-weight: normal !important;">TRN 000 000 000 000 000</span><br>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th class="font-monospace text-center" style="font-size: 6px;">Rental Reciept</th>
                </tr>
            </thead>
            <tbody class="font-monospace">
                <tr class="font-monospace"></tr>
                <tr class="font-monospace"></tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive font-monospace">
        <table class="table table-borderless">
            <thead class="font-monospace">
                <tr class="font-monospace" style="font-size: 5px;">
                    <th class="font-monospace">
                    <span>CUSTOMER: <strong><?php echo $customer; ?></strong></span>
                    </th>
                    <th class="font-monospace text-end"></th>
                    <th class="font-monospace text-end"></th>
                    <th class="font-monospace text-end">INVOICE #<?php echo $_GET['id'] ?></th>
                </tr>
            </thead>
            <tbody class="font-monospace">
                <?php getItems() ?>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="font-monospace">
                <tr class="font-monospace">
                    <th class="font-monospace text-end" style="font-size: 6px;"><strong>TOTAL</strong>&nbsp;<strong>₱<?php echo $total; ?></strong></th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap-select.min.js"></script>
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
    <script>
        function printPageAndRedirect() {
            window.print();
            setTimeout(function() {
                window.location.href = 'rents.php';
            }, 1000); // Redirect after 1 second (adjust as needed)
        }
    </script>
</body>

</html>