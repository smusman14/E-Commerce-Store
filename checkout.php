<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $address1 = $_POST['address1'] ?? '';
  $address2 = $_POST['address2'] ?? '';
  $region = $_POST['region'] ?? '';
  $city = $_POST['city'] ?? '';
  $area = $_POST['area'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $fullname = $_POST['fullname'] ?? '';
  $email = $_POST['email'] ?? '';

  // For now, just print the data (You can later insert into DB or send an email)
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout Page - Pakistan Only</title>
  <style>
    :root {
      --light-pink: #ffe4e1;
      --baby-pink: #ffb6c1;
      --mahroon: #800000;
      --white: #ffffff;
      --black: #000000;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: var(--light-pink);
      color: var(--black);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 800px;
      background-color: var(--white);
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      padding: 30px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container:hover {
      transform: scale(1.01);
      box-shadow: 0 0 20px var(--baby-pink);
    }

    h2 {
      color: var(--mahroon);
      margin-bottom: 20px;
      text-align: center;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: var(--mahroon);
    }

    input, select {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    input:focus, select:focus {
      outline: none;
      box-shadow: 0 0 10px var(--baby-pink);
      border-color: var(--baby-pink);
    }

    .order-summary {
      margin-top: 30px;
      padding: 20px;
      background-color: var(--baby-pink);
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(255, 182, 193, 0.6);
    }

    .order-summary h3 {
      margin-top: 0;
      color: var(--mahroon);
    }

    .place-order-btn {
      width: 100%;
      background-color: var(--mahroon);
      color: var(--white);
      padding: 15px;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      margin-top: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .place-order-btn:hover {
      background-color: #a52a2a;
      box-shadow: 0 0 15px var(--mahroon);
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }

      .place-order-btn {
        font-size: 16px;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Shipping Address</h2>
    <form method="POST" action="">
      <label for="address1">Street Address: Line 1</label>
      <input type="text" id="address1" name="address1" required>

      <label for="address2">Street Address: Line 2</label>
      <input type="text" id="address2" name="address2">

      <label for="region">Region / State / Province</label>
      <select id="region" name="region" required>
        <option value=\"\">--Select Region--</option>
        <option>Sindh</option>
        <option>Punjab</option>
        <option>Khyber Pakhtunkhwa</option>
        <option>Balochistan</option>
        <option>Gilgit-Baltistan</option>
        <option>Azad Jammu & Kashmir</option>
        <option>Islamabad Capital Territory</option>
      </select>

      <label for="city">City</label>
      <input type="text" id="city" name="city" required>

      <label for="area">Area</label>
      <input type="text" id="area" name="area" required>

      <label for="phone">Phone Number</label>
      <input type="text" id="phone" name="phone" placeholder="03xx-xxxxxxx" required>

      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <div class="order-summary">
        <h3>Order Summary</h3>
        <p><strong>Item:</strong> Flora Vogue T-200 Bed Sheet Set (Single)</p>
        <p><strong>Cart Subtotal:</strong> PKR 3,360.00</p>
        <p><strong>Shipping:</strong> PKR 99.00</p>
        <p><strong>Total:</strong> PKR 3,459.00</p>
      </div>

      <button class="place-order-btn" type="submit">Place Order</button>
    </form>
  </div>
</body>
</html>
