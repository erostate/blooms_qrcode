<?php
include('phpqrcode/qrlib.php'); // Include the library
include('function.inc.php');

if (isset($_POST['formCreateQrCode'])) {
    $link = $_POST['qrcode_url']; // Link of the QR Code
    $name = getCodeQrCode(5); // Name of the QR Code
    QRcode::png($link, 'qrcode/'.$name.'.png', QR_ECLEVEL_L, 15, 3); // Creation of the QR Code
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate a QR code with BLOOMsQR</title>
</head>
<body>
    <div>
        <img src="qrcode/<?= $_GET['r']; ?>.png" alt="">
    </div>
</body>
</html>
<style>
    body {
        display: flex;
        justify-content: center;
    }
    form#container {
        margin-top: 100px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form#container input {
        padding: 10px;
        width: 50%;
    }
    form#container div button {
        padding: 5px;
        margin-top: 10px;
    }
</style>