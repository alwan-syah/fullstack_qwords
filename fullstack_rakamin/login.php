<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGIN APLIKASI PENGGAJIAN PEGAWAI PT. BAROKAH</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            background: url(assets/img/gotg3.jpg) no-repeat center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body>.container {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> APLIKASI PENGGAJIAN</h3>
                </div>
                <div class="panel-body">
                    <center>
                        <img src="assets/img/labala.jpg" class="img-circle" alt="logo" width="120px">
                    </center>
                    <hr>


                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $user = $_POST['username'];
                        $pass = $_POST['password'];
                        $p    = md5($pass);

                        if ($user == '' || $pass == '') {
                    ?>
                            <div class="alert alert-warning" role="alert"><b>Warning!</b> Form Anda belum lengkap!</div>
                            <?php
                        } else {
                            include "koneksi.php";
                            $sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
                            $jml = mysqli_num_rows($sqlLogin);
                            $d = mysqli_fetch_array($sqlLogin);

                            if ($jml > 0) {
                                session_start();
                                $_SESSION['login'] = TRUE;
                                $_SESSION['id'] = $d['admin'];
                                $_SESSION['username'] = $d['username'];
                                $_SESSION['namalengkap'] = $d['namalengkap'];

                                header('Location:./index.php');
                            } else {
                            ?>
                                <div class="alert alert-danger"><b>ERROR</b> Username dan Password anda Salah!</div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>-->
    <script src="assets\js\jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>