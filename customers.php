<?php 
  require_once('config/config.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');

  // Instantiate Customer
  $customer = new Customer();

  // Get Customer
  $customers = $customer->getCustomers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>View Customers</title>
</head>
<body>
  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="customers.php" class="btn btn-primary">Customers</a>
      <a href="transactions.php" class="btn btn-secondary">Transactions</a>
    </div>
    <hr>
    <h2>Customers</h2>
    <table class="table table-striped">
      <thead>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
      </thead>
      <tbody>
      <?php foreach($customers as $c): ?>
          <tr>
            <td><?php echo $c->id;?></td>
            <td><?php echo "$c->first_name $c->last_name";?></td>
            <td><?php echo $c->email;?></td>
            <td><?php echo $c->created_at;?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <hr>
    <p><a href="index.php" class="btn btn-secondary">Pay Page</a></p>
  </div>
</body>
</html>