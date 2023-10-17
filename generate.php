<?php
include('phpqrcode/qrlib.php'); // Include the library
include('function.inc.php');

if (isset($_POST['formCreateQrCode'])) {
    $link = $_POST['qrcode_url']; // Link of the QR Code
    $name = getCodeQrCode(5); // Name of the QR Code
    QRcode::png($link, 'q/'.$name.'.png', QR_ECLEVEL_L, 15, 3); // Creation of the QR Code
    header('Location: ?r='.$name);
}
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
    <form id="container" action="" method="post">
        <input id="inpQrCode" type="url" name="qrcode_url" placeholder="Link of your QR code">
        <div style="margin-top: 10px;">
            <button onclick="changeTypeQrCode(this);" class="btn_other_type" style="margin-right: 10px;" type="button">Text into QR code</button>
            <button name="formCreateQrCode">Valider</button>
        </div>
    </form>
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
    button:hover {
        background-color: RoyalBlue;
        transition: all 0.15s ease-in-out;
    }

    .btn_other_type {
        background-color: salmon;
    }
    .btn_other_type:hover {
        background-color: saddlebrown;
    }
</style>
<script>
    function changeTypeQrCode(btnType) {
        var inpQrCode = document.getElementById('inpQrCode');

        if (inpQrCode.type == "url") {
            inpQrCode.type = "text";
            inpQrCode.placeholder = "Text into your QR code";
            btnType.innerText = "URL into QR code";
        } else {
            inpQrCode.type = "url";
            inpQrCode.placeholder = "Link of your QR code";
            btnType.innerText = "Text into QR code";
        }
    }
</script>