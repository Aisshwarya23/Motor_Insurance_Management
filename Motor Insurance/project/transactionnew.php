<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Insurance</title>
    <link rel=" shortcut icon" type="x-icon" href="logo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #006666 0%, #666699 100%);
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; 
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input {
            margin-bottom: 10px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 17px;
        }
        button {
            padding: 12px;
            background-color: #003399;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }
        button:hover {
            background-color: #001a4d;
        }
        .icon-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
        }
        .icon-container i {
            font-size: 36px;
        }

        .home-icon {
            position: fixed;
            top: 6%;
            left: 6%;
            z-index: 10;
        }

        .home-icon img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .home-icon img:hover {
            transform: scale(1.1);
        }

        .back-icon {
            position: fixed;
            top: 6%;
            left: 88%;
            z-index: 10;
        }

        .back-icon .back-img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .back-icon .back-img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .home-icon {
                top: 4%;
                left: 4%;
            }

            .home-icon img {
                width: 50px;
                height: 50px;
            }

            .back-icon {
                top: 4%;
                left: 89%;
            }

            .back-icon .back-img {
                width: 50px;
                height: 50px;
            }

            .container {
                position : absolute;
                top:12%;
                width : 72%;
                height: 100%;
            }
        }

        @media (max-width: 480px) {

            .home-icon {
                top: 4%;
                left: 4%;
            }

            .home-icon img {
                width: 50px;
                height: 50px;
            }

            .back-icon {
                top: 4%;
                left: 83%;
            }

            .back-icon .back-img {
                width: 50px;
                height: 50px;
            }
            .container {
                position : absolute;
                top:13%;
                width : 72%;
                height: 80%;
            }
        }

    </style>
</head>
<body>
<a href="new1.html" class="home-icon">
        <img src="home.jpg" alt="Home">
    </a>
    <div class="container">
    <?php
        if (isset($_GET['vehicle_num']) && isset($_GET['net_premium'])) {
            $vehicle_num = htmlspecialchars($_GET['vehicle_num'], ENT_QUOTES, 'UTF-8');
            $price = htmlspecialchars($_GET['net_premium'], ENT_QUOTES, 'UTF-8');

            echo "<h1>Package Details</h1>";
            echo "<p><strong>Vehicle Number:</strong> $vehicle_num</p>";
            echo "<p><strong>Amount to be Paid:</strong> $price</p>";

            $currentDateTime = date('Y-m-d H:i:s');
        } else {
            echo "<p>No parameters received.</p>";
        }
        ?>
        <h1><br>Enter Your Card Details</h1>
        <form id="creditCardForm" method="POST">
    <input type="hidden" id="vehicle_num" name="vehicle_num" value="<?php echo htmlspecialchars($vehicle_num); ?>" required>
    <input type="hidden" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

    <label for="card_name"><i class="fa fa-user"></i> Card Holder Name</label>
    <input type="text" id="card_name" name="card_name" placeholder="Name" required>

    <label for="card_number"><i class="fa fa-credit-card"></i> Card Number</label>
    <input type="text" id="card_number" name="card_number" placeholder="1111-2222-3333-4444" required>

    <div class="row">
        <div class="col-50">
            <label for="expiry_date"><i class="fa fa-calendar"></i> Expiry Date</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
        </div>
        <div class="col-50">
            <label for="cvv"><i class="fa fa-lock"></i> CVV</label>
            <input type="password" id="cvv" name="cvv" placeholder="352" required>
            <input type="hidden" id="current_date_time" name="current_date_time" value="<?php echo $currentDateTime; ?>">
        </div>
    </div>

    <div class="icon-container">
        <i class="fa fa-cc-visa" style="color:navy;"></i>
        <i class="fa fa-cc-mastercard" style="color:red;"></i>
        <i class="fa fa-cc-discover" style="color:orange;"></i>
    </div>

    <button type="button" onclick="submitForm()">Submit</button>
</form>
    </div>

    
</body>



<script>
function submitForm() {
    // Get form elements
    var cardName = document.getElementById('card_name').value;
    var cardNumber = document.getElementById('card_number').value;
    var expiryDate = document.getElementById('expiry_date').value;
    var cvv = document.getElementById('cvv').value;

    // Regular expressions for validation
    var cardNumberRegex = /^\d{16}$/;
    var expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
    var cvvRegex = /^\d{3}$/;

    // Validate Card Number
    if (!cardNumberRegex.test(cardNumber.replace(/\s+/g, ''))) { // Remove spaces for validation
        alert('Card Number must be 16 digits.');
        return;
    }

    // Validate Expiry Date
    if (!expiryDateRegex.test(expiryDate)) {
        alert('Expiry Date must be in MM/YY format.');
        return;
    }

    // Validate CVV
    if (!cvvRegex.test(cvv)) {
        alert('CVV must be 3 digits.');
        return;
    }

    // If all validations pass, proceed with form submission
    var form = document.getElementById('creditCardForm');
    var formData = new FormData(form);

    fetch('process_paymentnew.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes('successfully')) {
            var vehicleNum = encodeURIComponent(document.getElementById('vehicle_num').value);
            var price = encodeURIComponent(document.getElementById('price').value);
            var cardName = encodeURIComponent(document.getElementById('card_name').value);
            window.location.href = `endnew.php?vehicle_num=${vehicleNum}&price=${price}&card_name=${cardName}`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while processing your payment.');
    });
}
</script>
</html>
