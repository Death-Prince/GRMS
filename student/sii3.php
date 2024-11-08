<?php 
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$pageTitle = 'Students Individual Inventory';
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
                <div class="content-wrapper">
                    <div class="row border border-1 border-black mx-4 ">
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Name of Guardian (if not living with parents)</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Address</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Cellphone</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Relationship with Guardian</label>
                            <input type="text" class="ssi-input">
                        </div>

                        <div class="col-md-12 d-flex align-items-start gap-1 my-2 ">
                            <div class="fw-bold">
                                In case of Emergency:
                            </div>
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Person to Contact:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Age:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Occupation:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Contact Number:</label>
                            <input type="text" class="ssi-input">
                        </div>

                        <div class="col-md-12 d-flex align-items-start gap-1 my-2 ">
                            <div class="fw-bold">
                               Educational Background
                            </div>
                        </div>
                        
                        <div class="col-md-5 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Elementary:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-3 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Year:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Honors incurred:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-5 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Secondary:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-3 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Year:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Honors incurred:</label>
                            <input type="text" class="ssi-input">
                        </div>

                        <div class="col-md-12 d-flex align-items-start gap-1 my-2 ">
                            <div class="fw-bold">
                                Health
                            </div>
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Height:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Weight:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Blood Type:</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Are you suffering from any ailments or handicap?</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Are you under any medication?</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Did you have any suicidal attempts or thought? If yes, when? </label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Were you a victim of any form of abuse? If yes, when?</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Did you get involved with illegal drugs? If yes, when?</label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Do you have a mentally challenged family member/relative? </label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">If yes, how are you related to him/her? </label>
                            <input type="text" class="ssi-input">
                        </div>
                        
                        <div class="col-md-12 d-flex align-items-center ">
                            <label class="text-nowrap me-2">Have you visited a psychiatrist or psychologist before? (If yes, state the reason)</label>
                            <input type="text" class="ssi-input">
                        </div>

                        <div class="col-md-12 d-flex justify-content-end my-2 gap-1">
                            <a href="sii2.php" class="btn-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M20.834 8.037L9.64 14.5c-1.43.824-1.43 2.175 0 3l11.194 6.463c1.43.826 2.598.15 2.598-1.5V9.537c0-1.65-1.17-2.326-2.598-1.5" />
                                </svg>
                                Prev Page
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