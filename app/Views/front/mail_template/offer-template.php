<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leadsindia</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        p {
            color: #555555;
            margin-bottom: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            text-decoration: none;
            background-color: #e74c3c;
            color: #ffffff;
            border-radius: 5px;
        }

        .destination-image {
            width: 35%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Offer Enquiry from <?= htmlspecialchars($full_name) ?></h1>
        <img class="destination-image" src="https://leadsdev.keylines.net.in/public/assets/img/logo.png" alt="Destination Image">
        <p>Hello Leadsindia,</p>
        <br>
        

        <br>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td><strong>Name:</strong></td>
                <td><?= htmlspecialchars($full_name) ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?= htmlspecialchars($email_address) ?></td>
            </tr>            
            <tr>
                <td><strong>Phone:</strong></td>
                <td><?= htmlspecialchars($phone_number) ?></td>
            </tr>
            <tr>
                <td><strong>Promocode:</strong></td>
                <td><?=  $promo_code ?></td>
            </tr>            
        </table>

        <p class="footer">Best regards,<br><?= htmlspecialchars($full_name) ?></p>
    </div>
</body>

</html>