<?php
include "connection.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Înregistrare</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center custom-login">
                <h3>Înregistrare</h3>

            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Prenume</label>
                                    <input type="text" name="prenume" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Nume de familie</label>
                                    <input type="text" name="nume" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Nume de utilizator</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Parolă</label>
                                    <input type="password" name="parola" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Telefon</label>
                                    <input type="text" name="telefon" class="form-control" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit1"
                                    class="btn btn-success loginbtn">Inregistrează-te</button>
                            </div>
                            <div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
                                <strong>Cont nou creat!</strong> Te-ai înregistrat cu succes!
                            </div>

                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                                <strong>Contul există deja!</strong> Acest username este utilizat deja!
                            </div>
                            <div class="text-center">
                                <a href="login.php">Autentificare</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM registration WHERE username='$_POST[username]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            ?>
            <script type="text/javascript">
                document.getElementById("failure").style.display = "block";
                document.getElementById("success").style.display = "none";

            </script>
            <?php

        } else {
            mysqli_query($link, "INSERT INTO registration VALUES(NULL,'$_POST[prenume]','$_POST[nume]','$_POST[username]','$_POST[parola]','$_POST[email]','$_POST[telefon]')") or die(mysqli_error($link));
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display = "block";
                document.getElementById("failure").style.display = "none";
            </script>
            <?php
        }

    }

    ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>