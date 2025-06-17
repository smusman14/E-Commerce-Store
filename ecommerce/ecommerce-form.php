<?php
include 'connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productname = trim($_POST['productname']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);

    // Check if fields are not empty and price is a valid positive number
    if (empty($productname) || empty($description) || !is_numeric($price) || floatval($price) <= 0) {
        $message = "❌ Please fill in all fields correctly.";
    } else {
        // Use prepared statements for safety
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
            background-color: #1a1a1a;
            font-family: 'Segoe UI', sans-serif;
        }

        .neon-box {
            box-shadow: 0 0 15px #FFA500, 0 0 30px #FFD700;
            border: 2px solid #FFA500;
        }

        .neon-hover:hover {
            box-shadow: 0 0 25px #FFD700, 0 0 50px #FFA500;
            transition: 0.3s ease-in-out;
        }

        .message-box {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #15803d;
        }

        .error {
            background-color: #b91c1c;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-xl neon-box rounded-lg p-6 bg-gray-900 text-white shadow-xl">
        <h1 class="text-3xl text-center text-yellow-400 font-bold mb-6">🛒 Ecommerce Store</h1>

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
                    class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400" />

                <!-- Description -->
                <textarea name="description" placeholder="Description" rows="3"
                    class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400"></textarea>

                <!-- Price -->
                <input type="number" name="price" placeholder="Price ($)" step="0.01"
                    class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400" />

                <!-- Submit Button -->
                <button type="submit" name="submit"
                    class="mt-4 w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded neon-hover transition-all">
                    Submit Form
                </button>
            </div>
        </form>
    </div>
</body>
</html>
