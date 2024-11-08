<?php 
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$pageIcon ='mdi-account-card-details';
$pageTitle = 'About Us';
?>

<!DOCTYPE html>
<html lang="en">

<?php include '../include/head.php'; ?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include '../include/navbar.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <?php include '../include/sidebar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper ">
                    <div class="row g-2 d-flex justify-content-center">
                        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="border border-1 border-gray pt-2 bg-D9D9D926 text-center">
                                <img class="img-xlg rounded-circle mb-1" src="../images/faces/face23.jpg"
                                    alt="Profile image">
                                <h4 class="fw-bold">Bañaria, Mary Nicole L. </h4>
                                <h6 class="">Researcher</h6>
                                <h3> <i class="mdi mdi-email"></i></h3>
                                <h3> <i class="mdi mdi-phone"></i></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="border border-1 border-gray  pt-2 bg-D9D9D926 text-center">
                                <img class="img-xlg rounded-circle mb-1" src="../images/faces/face6.jpg"
                                    alt="Profile image">
                                <h4 class="fw-bold">Enrile, Jerly S. </h4>
                                <h6 class="">Researcher</h6>
                                <h3> <i class="mdi mdi-email"></i></h3>
                                <h3> <i class="mdi mdi-phone"></i></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="border border-1 border-gray  pt-2 bg-D9D9D926 text-center">
                                <img class="img-xlg rounded-circle mb-1" src="../images/faces/face11.jpg"
                                    alt="Profile image">
                                <h4 class="fw-bold">Olaso, Eunice I. </h4>
                                <h6 class="">Researcher</h6>
                                <h3> <i class="mdi mdi-email"></i></h3>
                                <h3> <i class="mdi mdi-phone"></i></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="border border-1 border-gray  pt-2 bg-D9D9D926 text-center">
                                <img class="img-xlg rounded-circle mb-1" src="../images/faces/face20.jpg"
                                    alt="Profile image">
                                <h4 class="fw-bold">Nodado, Mae P. </h4>
                                <h6 class="">Researcher</h6>
                                <h3> <i class="mdi mdi-email"></i></h3>
                                <h3> <i class="mdi mdi-phone"></i></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="border border-1 border-gray  pt-2 bg-D9D9D926 text-center">
                                <img class="img-xlg rounded-circle mb-1" src="../images/faces/face26.jpg"
                                    alt="Profile image">
                                <h4 class="fw-bold">Sanglay, Diana N.</h4>
                                <h6 class="">Researcher</h6>
                                <h3> <i class="mdi mdi-email"></i></h3>
                                <h3> <i class="mdi mdi-phone"></i></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../js/template.js"></script>
</body>

</html>