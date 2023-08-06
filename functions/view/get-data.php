<?php
include_once 'functions/connection.php';
function get_customer_data() {
    global $db;
    $sql = 'SELECT t.id, c.fullname, c.phone, c.email, c.address
    FROM customers c
    JOIN transactions t ON c.id = t.customer_id
    WHERE t.user_id = :user_id AND t.status = "pending"
    ORDER BY t.id DESC LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['id']);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$results){
        header('Location: ./index.php?type=error&message=you have no pending transaction!');
        exit;
    }
    return $results;
}

function get_total_rental_item($id) {
    global $db;
    $sql = "SELECT SUM(r.price) AS total, c.fullname 
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_count_rental_items($id){
    global $db;
    $sql = "SELECT COUNT(r.id) AS total, c.fullname 
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_total_rent(){
    global $db;
    $sql = "SELECT COUNT(id) AS total 
    FROM transactions 
    WHERE status = 'In Progress'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_total_late(){
    global $db;
    $sql = "SELECT COUNT(r.id) AS total, t.status 
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    WHERE t.status = 'In Progress' AND r.returned < NOW()";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}


function get_total_customers(){
    global $db;
    $sql = "SELECT COUNT(id) AS total FROM customers";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_today_earning(){
    global $db;
    $sql = "SELECT SUM(price + penalty) AS total FROM rentals WHERE DATE(created_at) = CURDATE() AND conditions IS NOT NULL";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_monthly_earning(){
    global $db;
    $sql = "SELECT SUM(price + penalty) AS total FROM rentals WHERE MONTH(created_at) = MONTH(NOW()) AND conditions IS NOT NULL";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_yearly_earning(){
    global $db;
    $sql = "SELECT SUM(price + penalty) AS total FROM rentals WHERE YEAR(created_at) = YEAR(NOW()) AND conditions IS NOT NULL";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_total_borrowed(){
    global $db;
    $sql = "SELECT COUNT(id) AS total FROM rentals WHERE conditions IS NULL";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_total_returned(){
    global $db;
    $sql = "SELECT COUNT(id) AS total FROM rentals WHERE conditions IS NOT NULL";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_new_customer(){
    global $db;
    $sql = "SELECT COUNT(id) AS total FROM customers WHERE DATE(created_at) = CURDATE()";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function get_new_damage(){
    global $db;
    $sql = "SELECT COUNT(id) AS total FROM rentals WHERE DATE(created_at) = CURDATE() AND conditions > 1";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'] ?? 0;
}

function daily_chart(){
  global $db;
  $sql = "SELECT DATE(created_at) AS date, SUM(price+penalty) AS total_sales
    FROM rentals
    WHERE conditions IS NOT NULL
    GROUP BY DATE(created_at)
    ORDER BY DATE(created_at)";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $labels = [];
  $data = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $date = date("M d, Y", strtotime($row['date']));
    $labels[] = $date;
    $data[] = $row['total_sales'];
  }
  $chartData = [
    'labels' => $labels,
    'datasets' => [
      [
        'label' => 'Daily Earnings',
        'fill' => true,
        'data' => $data,
        'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
        'borderColor' => 'rgba(78, 115, 223, 1)'
      ]
    ]
  ];

  $chartDataJson = json_encode($chartData);
  ?>
  <canvas data-bss-chart='{"type":"line","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
  <?php
}


function month_chart(){
  global $db;
  $sql = "SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, SUM(price+penalty) AS total_sales
  FROM rentals
  WHERE conditions IS NOT NULL
  GROUP BY YEAR(created_at), MONTH(created_at)
  ORDER BY YEAR(created_at), MONTH(created_at)";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $labels = [];
  $data = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $monthName = date("M", mktime(0, 0, 0, $row['month'], 10));
  $labels[] = $monthName . ' ' . $row['year'];
  $data[] = $row['total_sales'];
  }
  $chartData = [
  'labels' => $labels,
  'datasets' => [
  [
  'label' => 'Earnings',
  'fill' => true,
  'data' => $data,
  'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
  'borderColor' => 'rgba(78, 115, 223, 1)'
  ]
  ]
  ];


  $chartDataJson = json_encode($chartData);
  ?>
  <canvas data-bss-chart='{"type":"line","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
  <?php
}

