<?php 
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$pageIcon ='mdi-grid-large';
$pageTitle = 'Dashboard';
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
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4 d-flex justify-content-center">
                            <a href="sii.php"
                                class="border border-2 dashboard-devider border-black pt-2 bg-CFEAFEBF text-center px-2">
                                <img class="img-xlg mb-1" src="../images/dashboard/image.png" alt="Profile image">
                                <h4 class="fw-bold dashboard-title bg-D9D9D9 border border-2 border-black">Students
                                    Individual Inventory</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial -->
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