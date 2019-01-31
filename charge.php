<?php 
  require_once('vendor/autoload.php');
  require_once('config/config.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  echo SECRET_KEY;
  \Stripe\Stripe::setApiKey(SECRET_KEY);

  // Sanitize POST Array
  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $first_name = $POST['first_name'];
  $last_name = $POST['last_name'];
  $email = $POST['email'];
  $token = $POST['stripeToken'];

  // Create customer in Stripe
  $customer = \Stripe\Customer::create([
    "email" => $email,
    "source" => $token
  ]);

  // Charge customer
  $charge = \Stripe\Charge::create([
    "amount" => 5000,
    "currency" => 'USD',
    "description" => "Test",
    "customer" => $customer->id
  ]);

  //Customer Data
  $customerData = [
    "id" => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
  ];

  //Transaction Data
  $transactionData = [
    "id" => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
  ];

  //Instantiate Customer
  $customer = new Customer();

  //Instantiate Transacion
  $transaction = new Transaction();

  //Add customer to DB
  $customer->addCustomer($customerData);

  //Add transaction to DB
  $transaction->addTransaction($transactionData);


  // Redirect to Success Page
  header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

?>