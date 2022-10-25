<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>
<?php
if (isset($message)) {
    echo $message;
    $message = "";
}
?>

<body background="<?php echo base_url('assets/img/background.jfif'); ?>" style="background-repeat: no-repeat;background-size: cover;">

    <div class="container-login">

        <!-- Outer Row -->
        <div class="row justify-content-center">


            <div class="card o-hidden border-0 shadow-lg my-5">
                <!-- Nested Row within Card Body -->
                <div class="batas-login">
                    <div class="text-center">
                        <div class="h4 judul-login">BAST Apps</div>
                        <p class="mb-4">Aplikasi Berita Acara Serah Terima PT.KCI</p>
                    </div>
                    <form class="user" action="<?php echo base_url('login_controller/dashboard') ?>" method="POST">
                        <div class="form-group">
                            <input type="number" style="border-radius: 10px !important;" class="custom-form form-control" name="nip" placeholder="NIPP"  maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        </div>
                        <div class="form-group">
                            <input type="password" style="border-radius: 10px !important;" class="custom-form form-control" name="password" placeholder="Password" required>
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-danger btn-block custom-button">
                    </form>
                </div>
            </div>


        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>