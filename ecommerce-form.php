<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce Store Form</title>
    <!-- Tailwind CSS CDN -->
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

        .tv-display {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: black;
            color: lime;
            font-family: 'Courier New', Courier, monospace;
            padding: 40px;
            font-size: 2rem;
            border: 4px solid lime;
            box-shadow: 0 0 20px lime;
            opacity: 1;
            z-index: 999;
            animation: fadeOut 2s ease-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-xl neon-box rounded-lg p-6 bg-gray-900 text-white shadow-xl animate-fade-in">

        <h1 class="text-3xl text-center text-yellow-400 font-bold mb-6">🛒 Ecommerce Store</h1>

        <form id="ecommerceForm" enctype="multipart/form-data" method="POST">
            <div class="space-y-4">
                <!-- ID -->
                <input type="text" name="id" placeholder="Product ID" required class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400" />

                <!-- Product Name -->
                <input type="text" name="product_name" placeholder="Product Name" required class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400" />

                <!-- Description -->
                <textarea name="description" placeholder="Description" required rows="3" class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400"></textarea>

                <!-- Price -->
                <input type="number" name="price" placeholder="Price ($)" step="0.01" required class="w-full p-3 rounded neon-hover bg-gray-800 text-yellow-200 placeholder-yellow-400" />

                <!-- Images -->
                <div class="flex items-center space-x-3">
                    <label class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded cursor-pointer transition">
                        Choose Image
                        <input type="file" name="image" accept="image/*" class="hidden" required>
                    </label>
                    <span class="text-sm text-yellow-300" id="file-chosen">No file chosen</span>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitBtn" class="mt-4 w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded neon-hover transition-all">
                    Submit Form
                </button>
            </div>
        </form>
    </div>

    <!-- TV Display -->
    <div id="tvDisplay" class="tv-display hidden">
        📺 SUBMITTED
    </div>

    <script>
        // File name display
        document.querySelector('input[type="file"]').addEventListener('change', function() {
            document.getElementById('file-chosen').textContent = this.files[0]?.name || "No file chosen";
        });

        // Form submission handling
        document.getElementById('ecommerceForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulate form submission
            setTimeout(() => {
                // Show alert
                alert("Form Submitted");

                // Show TV Display
                const tv = document.getElementById('tvDisplay');
                tv.classList.remove('hidden');
                tv.classList.add('block');

                // Update submit button
                const btn = document.getElementById('submitBtn');
                btn.innerText = "Form Submitted";
                btn.classList.add('bg-green-500', 'hover:bg-green-600');
                
                // Auto hide TV after 2s (via CSS animation)
                setTimeout(() => {
                    tv.classList.add('hidden');
                }, 2000);

                // Reload page after 2.5s
                setTimeout(() => {
                    location.reload();
                }, 2500);
            }, 500);
        });
    </script>
</body>
</html>
