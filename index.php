<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Pay Page</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Annual Subscription $399</h2>
    <form action="charge.php" method="post" id="payment-form">
      <div class="form-row">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" 
          name = "first_name" placeholder="First Name">
        <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" 
          name = "last_name" placeholder="Last Name">
        <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" 
          name = "email" placeholder="Email Address">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element" class="form-control">
          <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>