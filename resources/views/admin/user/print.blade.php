<!DOCTYPE html>
<html>

<head>
    <title>User QR Code</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
        }

        .qr-img {
            margin-top: 50px;
            width: 200px;
        }

        .user-name {
            font-size: 22px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <img src="{{ $qr_image }}" class="qr-img">
    <div class="user-name">{{ $name }}</div>

</body>

</html>
