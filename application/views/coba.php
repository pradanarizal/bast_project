<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Signature</title>
    <link rel="stylesheet" href="../libs/css/bootstrap.v3.3.6.css">
    <script type="text/javascript" src="assets/signature.js"></script>
    <style>
        body {
            padding: 15px;
        }

        #note {
            position: absolute;
            left: 50px;
            top: 35px;
            padding: 0px;
            margin: 0px;
            cursor: default;
        }
    </style>
</head>

<body>
    <h1>Digital Signature</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <div id="signature-pad">
            <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                <canvas id="the_canvas" width="350px" height="100px"></canvas>
            </div>
            <div style="margin:10px;">
                <input type="hidden" id="signature" name="signature">
                <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear">Clear</button>
                <button type="submit" id="save_btn" class="btn btn-success" data-action="save-png">Save</button>
            </div>
        </div>
    </form>
</body>
<?php
if (isset($_POST['signature'])) {
    $sig_string = $_POST['signature'];
    $nama_file = "assets/signature_1.png";
    file_put_contents($nama_file, file_get_contents($sig_string));
    if (file_exists($nama_file)) {
        echo "<p>File Signature berhasil disimpan - " . $nama_file . "</p>";
        echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='" . base_url($nama_file) . "'></p>";
    }
}
?>

</html>