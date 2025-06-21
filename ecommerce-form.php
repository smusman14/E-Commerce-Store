<?php
include 'connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productname = trim($_POST['productname']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);

    if (empty($productname) || empty($description) || !is_numeric($price) || floatval($price) <= 0) {
        $message = "❌ Please fill in all fields correctly.";
    } else {
        $stmt = $connect->prepare("INSERT INTO ecommercedatabase.ecommercestoretable (productname, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $productname, $description, $price);
        $result = $stmt->execute();

        if ($result) {
            $message = "✅ Product submitted successfully.";
        } else {
            $message = "❌ Error submitting the product.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce Store Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #FFB6C1; /* black */
            font-family: 'Segoe UI', sans-serif;
        }

        .neon-box {
            background-color: #4B0000; /* dark maroon */
            box-shadow: 0 0 15px #FFB6C1, 0 0 30px #FFC0CB;
            border: 2px solid #FFC0CB;
        }

        .neon-hover:hover {
            box-shadow: 0 0 25px #FFC0CB, 0 0 50px #FFB6C1;
            transition: 0.3s ease-in-out;
        }

        .message-box {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            color: #FFFFFF; /* white text */
        }

        .success {
            background-color: #15803d; /* green */
        }

        .error {
            background-color: #b91c1c; /* red */
        }

        .form-input,
        .form-textarea,
        .form-button {
            background-color: #4B0000;
            color: #FFB6C1;
            border: 1px solid #FFC0CB;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #FFB6C1;
        }

        .form-button:hover {
            background-color: #4B0000;
            color: #FFFFFF;
            border-color: #FFB6C1;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-xl neon-box rounded-lg p-6 text-white shadow-xl">
        <h1 class="text-3xl text-center font-bold mb-6 text-rose-200">🛒 Ecommerce Store</h1>

        <!-- Message Display -->
        <?php if (!empty($message)): ?>
            <div class="message-box <?php echo (str_starts_with($message, '✅')) ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="space-y-4">
                <!-- Product Name -->
                <input type="text" name="productname" placeholder="Product Name"
                    class="form-input w-full p-3 rounded neon-hover" />

                <!-- Description -->
                <textarea name="description" placeholder="Description" rows="3"
                    class="form-textarea w-full p-3 rounded neon-hover"></textarea>

                <!-- Price -->
                <input type="number" name="price" placeholder="Price ($)" step="0.01"
                    class="form-input w-full p-3 rounded neon-hover" />

                <!-- Submit Button -->
                <button type="submit" name="submit"
                    class="form-button mt-4 w-full py-3 font-bold rounded neon-hover transition-all">
                    Submit Form
                </button>
            </div>
        </form>
    </div>
</body>
</html>
