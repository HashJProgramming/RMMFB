<?php
include_once 'functions/connection.php';

function user_logs()
{
    global $db;
    $sql = 'SELECT * FROM logs';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();


    foreach ($results as $row) {
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['logs'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
        </tr>
    <?php
    }
}

function customer_list()
{
    global $db;
    $sql = 'SELECT * FROM customers ORDER BY fullname ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $row) {
    ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['facebook'] ?></td>
            <td><?php echo $row['birthdate'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td class="text-center">
                <a data-bss-tooltip="" class="mx-1" href="profile.php?id=<?php echo $row['id'] ?>" title="Here you can see the customer transactions."><i class="far fa-eye text-primary" style="font-size: 20px;"></i></a>
                <a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" data-id="<?php echo $row['id'] ?>" data-fullname="<?php echo $row['fullname'] ?>" data-address="<?php echo $row['address'] ?>" data-phone="<?php echo $row['phone'] ?>" data-facebook="<?php echo $row['facebook'] ?>" data-birthdate="<?php echo $row['birthdate'] ?>" title="Here you can update the customer Information."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a>
                <!-- <a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" data-id="<?php echo $row['id'] ?>" title="Here you can remove the customer."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a> -->
            </td>
        </tr>
    <?php
    }
}

function customers()
{

    global $db;
    $sql = 'SELECT * FROM customers ORDER BY fullname ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $select = false;
    foreach ($results as $row) {
    ?>
        <option value="<?php echo $row['id'] ?>" <?php if (!$select) {
                                                        echo 'selected';
                                                        $select = true;
                                                    } ?>><?php echo $row['fullname'] ?></option>
    <?php
    }
}

function staff_list()
{
    global $db;
    $sql = 'SELECT * FROM users WHERE type = "staff"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $row) {
    ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['username']; ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td class="text-center">
                <a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#update" data-id="<?php echo $row['id'] ?>" data-username="<?php echo $row['username'] ?>" title="Here you can update the customer Information."><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a>
                <a data-bs-toggle="modal" data-bss-tooltip="" class="mx-1" href="#" data-bs-target="#remove" data-id="<?php echo $row['id'] ?>" title="Here you can remove the customer."><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a>
            </td>
        </tr>
    <?php
    }
}

function item_list()
{
    global $db;
    $sql = 'SELECT * FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $row) {
    ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td>₱<?php echo $row['price'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td class="text-center">
                <a class="mx-1" href="#" data-bss-tooltip="" title="Here you can stock in the item." data-bs-target="#stock-in" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>">
                    <i class="far fa-arrow-alt-circle-up text-success" style="font-size: 20px;"></i></a>
                <!-- <a class="mx-1" href="#" data-bss-tooltip="" title="Here you can stock out the item." data-bs-target="#stock-out" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>">
                    <i class="far fa-arrow-alt-circle-down" style="font-size: 20px;"></i></a> -->
                <a class="mx-1" href="#" data-bss-tooltip="" title="Here you can update the item." data-bs-target="#update" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-description="<?php echo $row['description'] ?>" data-price="<?php echo $row['price'] ?>">
                    <i class="far fa-edit text-warning" style="font-size: 20px;"></i></a>
                <a class="mx-1" href="#" data-bss-tooltip="" title="Here you can remove the item." data-bs-target="#remove" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>">
                    <i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a>
            </td>
        </tr>
    <?php
    }
}

function items()
{
    global $db;
    $sql = 'SELECT * FROM inventory ORDER BY name ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $select = false;
    foreach ($results as $row) {
    ?>
        <?php if ($row['qty'] > 0) { ?>
            <option value="<?php echo $row['id'] ?>" <?php if (!$select) {
                                                            echo 'selected';
                                                            $select = true;
                                                        } ?>><?php echo $row['name'] ?> | Qty: <?php echo $row['qty'] ?> | Price: ₱<?php echo $row['price'] ?></option>
        <?php
        }
    }
}

function transaction_item_list($id)
{
    global $db;
    $sql = 'SELECT t.id, i.name, t.qty, i.price, t.returned,  t.item_id
    FROM inventory i 
    INNER JOIN rentals t ON i.id = t.item_id WHERE t.transact_id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll();

    foreach ($results as $row) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td>₱<?php echo $row['price'] ?></td>
            <td><?php echo $row['returned'] ?></td>
            <td class="text-center"><a class="mx-1" href="#" data-bs-target="#update" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>" data-date="<?php echo $row['returned'] ?>"><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a class="mx-1" href="#" data-bs-target="#remove" data-bs-toggle="modal" data-id="<?php echo $row['id'] ?>"><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
        </tr>
    <?php
    }
}

function get_rent_list()
{
    global $db;
    $sql = "SELECT r.id, i.name, r.qty, (i.price * r.qty) AS price, r.returned, r.penalty, r.item_return, r.created_at, t.status, c.fullname, c.phone, c.address, c.id as customer_id, t.id as transact_id, t.event
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    JOIN customers c ON t.customer_id = c.id
    JOIN inventory i ON r.item_id = i.id
    WHERE t.status = 'In Progress' AND r.qty != r.item_return";
    $statement = $db->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $row) {
        $status = '';
        $daysOverdue = 0;

        if ($row['status'] == 'In Progress') {
            $status = 'Not Yet Returned';
        } elseif ($row['status'] == 'Returned') {
            $status = 'Returned';
        }

        $returnedDateTime = new DateTime($row['returned']);
        $currentDateTime = new DateTime();
        if ($row['status'] == 'In Progress' && $returnedDateTime < $currentDateTime) {
            $status = 'Overdue';
            $interval = $currentDateTime->diff($returnedDateTime);
            $daysOverdue = $interval->days;
        }
    ?>
        <tr>
            <td><?php echo $row['transact_id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['item_return'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['returned'] ?></td>
            <td>₱<?php echo number_format($row['price'], 2) ?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $status ?> | <?php echo $daysOverdue ?> Days</td>
            <td class="text-center">
                <a data-bss-tooltip="" class="mx-1" href="profile.php?id=<?php echo $row['customer_id'] ?>" title="Here you can see the customer transactions."><i class="far fa-eye text-primary" style="font-size: 20px;"></i></a>
                <a class="mx-1" data-bs-toggle="modal" title="Here you can update the transaction status." href="#" data-bs-target="#return" data-id="<?php echo $row['id'] ?>" data-qty="<?php echo $row['qty'] ?>" data-item_return="<?php echo $row['item_return'] ?>"><i class="far fa-check-circle" style="font-size: 20px;"></i></a>
            </td>
        </tr>
    <?php
    }
}

function get_transaction_list()
{
    global $db;
    $sql = "SELECT r.id, i.name, r.qty, r.price, r.returned, r.penalty, r.conditions, r.item_damage, r.item_repaired, r.item_beyond_repair, r.created_at, t.status, c.fullname, c.phone, c.address, c.id as customer_id, t.id as transact_id
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    JOIN customers c ON t.customer_id = c.id
    JOIN inventory i ON r.item_id = i.id
    WHERE r.qty = r.item_return";
    $statement = $db->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $row) {
    ?>
        <tr>
            <td><?php echo $row['transact_id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['qty'] - $row['item_damage'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['returned'] ?></td>
            <td>₱<?php echo number_format($row['penalty'] , 2) ?></td>
            <td>₱<?php echo number_format($row['price'] , 2) ?></td>
            <td class="text-center">Damage</td>
            <td class="text-center">Repaired</td>
            <td class="text-center">UnRepaired</td>
            <!-- <td class="text-center"><span class="badge bg-primary">Damage</span></td>
            <td class="text-center"><span class="badge bg-success">Repaired</span></td>
            <td class="text-center"><span class="badge bg-danger">UnRepaired</span></td> -->
            <td class="text-center">
                <a data-bss-tooltip="" class="mx-1" href="profile.php?id=<?php echo $row['customer_id'] ?>" title="Here you can see the customer transactions."><i class="far fa-eye text-primary" style="font-size: 20px;"></i></a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center"><?php echo $row['item_damage'] ?></td>
            <td class="text-center"><?php echo $row['item_repaired'] ?></td>
            <td class="text-center"><?php echo $row['item_beyond_repair'] ?></td>
            <td></td>
        </tr>
    <?php
    }
}

function get_damage_transaction_list()
{
    global $db;
    $sql = "SELECT r.id, i.name, r.item_damage, r.item_repaired, r.item_beyond_repair, r.price, r.returned, r.penalty, r.conditions, r.created_at, t.status, c.fullname, c.id as customer_id, t.id as transact_id
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    JOIN customers c ON t.customer_id = c.id
    JOIN inventory i ON r.item_id = i.id
    WHERE r.item_damage != (r.item_repaired + r.item_beyond_repair)";

    $statement = $db->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $row) {

    ?>
        <tr>
            <td><?php echo $row['transact_id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['item_damage'] ?></td>
            <td><?php echo $row['item_repaired'] ?></td>
            <td><?php echo $row['item_beyond_repair'] ?></td>
            <td>₱<?php echo $row['penalty'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td class="text-center">
                <a data-bss-tooltip="" class="mx-1" data-bs-toggle="modal" data-bs-target="#update" data-id="<?php echo $row['id'] ?>" title="Here you can update the item condition."><i class="far fa-edit text-primary" style="font-size: 20px;"></i></a>
            </td>
        </tr>
    <?php
    }
}


function get_customer_transaction_list()
{
    global $db;
    $sql = "SELECT r.id, i.name, r.qty, i.price , (i.price * r.qty) AS total_price, r.returned, r.penalty, r.conditions, r.created_at, t.status, c.fullname, c.phone, c.address, c.id as customer_id, t.id as transact_id
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    JOIN customers c ON t.customer_id = c.id
    JOIN inventory i ON r.item_id = i.id
    WHERE (c.id = :customer_id)";

    $statement = $db->prepare($sql);
    $statement->bindValue(':customer_id', $_GET['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $row) {
    ?>
        <tr>
            <td><?php echo $row['transact_id'] ?></td>
            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.png"><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['returned'] ?></td>
            <td>₱<?php echo number_format($row['price'], 2) ?></td>
            <td>₱<?php echo number_format($row['total_price'], 2) ?></td>
        </tr>
<?php
    }
}
