<?php

include '../model/database/connect.php';

session_start();
$message = "";
if (count($_POST) > 0) {
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'khms') or die('Unable To connect');
    $result = mysqli_query($con, "SELECT * FROM employees WHERE username='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        if ($row['role'] == 'manager') {
            header("Location:../view/admin/admin.php");
        } else {
            header("Location:../view/employer/empCMS.php");
        }
    } else {
        $message = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Login | خيرات الدواء</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <style>
        /* Fonts */
        @font-face {
            font-family: GESbold;
            src: url("../../resource/font/Bold.otf") format("opentype");
        }

        @font-face {
            font-family: GESmedium;
            src: url("../../resource/font/Medium.otf") format("opentype");
        }

        @font-face {
            font-family: GESlight;
            src: url("../../resource/font/Light.otf") format("opentype");
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <form name="frmUser" method="post" action="" align="center" style="border: 1px solid gray;width: 50%;margin: auto;padding: 15px;">
            <div class="message"><?php if ($message != "") {
                                        echo $message;
                                    } ?></div>
            <h3 align="center">Enter Login Details</h3>
            <hr>
            Username:<br>
            <input type="text" name="user_name" class="form-control" style="width: 80%; margin: auto;" require>
            <br>
            Password:<br>
            <input type="password" name="password" class="form-control" style="width: 80%; margin: auto;" require>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit" style="width: 40%;">
            <input class="btn btn-secondary" type="reset" name="reset" value="Reset" style="width: 40%;">
        </form>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact text-center">
                        <img src="../../resource/img/khme-logo.jpeg" alt="" class="img-fluid">
                        <h3>Drug Donation</h3>
                        <div class="social-links text-md-right pt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4 style="font-family: GESmedium;">روابط مفيدة</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="../../index.html" style="font-family: GESlight;">الرئيسية</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.socialthon.net/" style="font-family: GESlight;">السوشلثون</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="../view/general/aboutteam.html" style="font-family: GESlight;">فريق السوشلثون</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="../view/general/policyScreen.html" style="font-family: GESlight;">الشروط والأحكام</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" style="font-family: GESlight;">دخول الموظفين</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4 style="font-family: GESlight;">جميع الحقوق محفوظة</h4>
                        <br><br>
                        <div class="copyright" dir="ltr">
                            &copy; Copyright <strong><span>Drug Donation</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits" dir="ltr">
                            Developed by <a href="https://qarinet01.github.io/MySite/">Qari.Net</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/aos/aos.js"></script>
    <script src="../..assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../..assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../..assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../..assets/vendor/php-email-form/validate.js"></script>
    <script src="../..assets/vendor/purecounter/purecounter.js"></script>
    <script src="../..assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../..assets/js/main.js"></script>
</body>

</html>