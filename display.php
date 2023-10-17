<?php
include('phpqrcode/qrlib.php'); // Include the library
include('function.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate a QR code with BLOOMsQR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <button onclick="window.location.href='./'">Back to home</button>
    </div>
    <section>
        <div>
            <img src="q/<?= $_GET['r']; ?>.png" alt="">
        </div>
        <div style="margin-top: 100px;">
            <a href="q/<?= $_GET['r']; ?>.png" download="<?= $_GET['r']; ?>.png"><i class="fa fa-download"></i> Download</a>
            <a onclick="copyLinkQrCode('<?= $_GET['r']; ?>')"><i class="fa fa-copy"></i> Copy link</a>
        </div>
    </section>
</body>
</html>
<style>
    body {
        display: flex;
        flex-direction: column;
    }
    section {
        display: flex;
        flex-direction: row;
    }
    img {
        height: calc(100vh - 20px);
    }

    a,
    button {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
        text-decoration-line: none;
        transition: all 0.15s ease-in-out;
    }
    a:hover,
    button:hover {
        background-color: RoyalBlue;
        transition: all 0.15s ease-in-out;
    }
</style>
<script>
    function copyLinkQrCode(qrcode) {
        var text = "https://qrcode.blms.fr/q/"+qrcode+".png";

        navigator.clipboard.writeText(text);

        alert('Copied QRcode link : '+ text);
    }
</script>