<?php
include_once 'functions/connection.php';


function navbar(){
    global $db;
    $sql = "SELECT * FROM transactions WHERE user_id = :id AND status = 'pending'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($_SESSION['type'] == 'admin') {
        ?>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="index.php" title="Here you can see your Dashboard." style="color: #393939;" ><img src="assets/img/home.png" width="20"> Home</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'sales.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="sales.php" title="Here you can see your Sales &amp; Transactions." style="color: #393939;" ><img src="assets/img/business.png" width="20"> Transactions</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'rents.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="rents.php" title="Here you can Monitor the rental transactions." style="color: #393939;" ><img src="assets/img/insurance.png" width="20"> Rentals</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'customers.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="customers.php" title="Here you can manage and view customers." style="color: #393939;" ><img src="assets/img/user.png" width="20"> Customer</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'staff.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="staff.php" title="Here you can manage and view staffs." style="color: #393939;" ><img src="assets/img/user.png" width="20"> Staff</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'inventory.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="inventory.php" title="Here you can manage your Inventory." style="color: #393939;" ><img src="assets/img/inventory.png" width="20"> Inventory</a></li>
        <?php
        if($row){
            ?>
            <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'transaction.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="transaction.php" title="Here you can see your unprocess transaction." style="color: #393939;" ><img src="assets/img/clock.png" width="20"> History</a></li>
            <?php
        }
        ?>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'account.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="account.php" title="Here you can manage your account." style="color: #393939;" ><img src="assets/img/avatars/avatar1.png" width="20"> My Account</a></li>
        <?php
    } elseif ($_SESSION['type'] == 'staff') {
        ?>
        
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'rents.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="rents.php" title="Here you can Monitor the rental transactions." style="color: #393939;" ><img src="assets/img/insurance.png" width="20"> Rentals</a></li>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'customers.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="customers.php" title="Here you can manage and view customers." style="color: #393939;" ><img src="assets/img/user.png" width="20"> Customer</a></li>
        <?php
        if($row){
            ?>
            <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'transaction.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="transaction.php" title="Here you can see your unprocess transaction." style="color: #393939;" ><img src="assets/img/clock.png" width="20"> History</a></li>
            <?php
        }
        ?>
        <li class="nav-item"><a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'account.php') !== false) echo 'link-primary'; ?>" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="bottom" href="account.php" title="Here you can manage your account." style="color: #393939;" ><img src="assets/img/avatars/avatar1.png" width="20"> My Account</a></li>
        <?php
    }
}

