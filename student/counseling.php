<?php 
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$pageIcon ='mdi-account-switch';
$pageTitle = 'Counseling';
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../include/head.php'; ?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <?php include '../include/navbar.php'; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.php -->
            <?php include '../include/sidebar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper d-flex justify-content-center align-items-center">
                    <div class="row ">
                        <div class="col-md-12">
                            <form action="" class="col-md-12">
                                <div class="border border-1 border-black p-3">
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap mx-2">Student Number</h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">Student Fullname </h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-wrap mx-2">
                                            How are you feeling about <br>
                                            your current academic workload?
                                        </h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">
                                            What subjects or topics do <br>
                                            you find most challenging, and why? </h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">
                                            Are there any personal issues <br>
                                            outside of school that are <br>
                                            affecting your studies?
                                        </h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">
                                            Do you feel you have a good <br>
                                            support system among your <br>
                                            friends, family, and teachers?</h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">
                                            Is there anything specific you <br>
                                            wish you could change about <br>
                                            your current situation or <br>
                                            environment? </h6>
                                        <input type="text">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <h6 class="text-nowrap  mx-2">Date Request</h6>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-1">
                                    <button type="submit"  class="btn btn-submit">Submit</button>
                                </div>
                            </form>
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