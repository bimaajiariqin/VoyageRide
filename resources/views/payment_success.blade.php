

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f7fa; font-family: 'Poppins', sans-serif; }
        .success-card {
            max-width: 700px;
            margin: 100px auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .btn-primary { background-color: #0056d2; border: none; border-radius: 10px; padding: 10px 20px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="success-card">
    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" width="100" alt="Success">
    <h1 class="mt-4">Payment Successful!</h1>
    <p class="text-muted">Thank you for your booking. Your ticket has been confirmed.</p>
    <a href="{{ url('landing') }}" class="btn btn-primary">Back to Home</a>
</div>

</body>
</html>
