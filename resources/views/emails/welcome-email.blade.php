<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks for Registering!</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container">
        <h1>Hello, {{ $user->name }}</h1>
        <h2>Thanks for Registering!</h2>
        <p>We're excited to have you join our community.</p>
        <p>Check your email for a confirmation link to complete your registration.</p>
        <a class="btn btn-success" href="{{ route('home.page') }}">Go to Home Page</a>
    </div>
</body>
