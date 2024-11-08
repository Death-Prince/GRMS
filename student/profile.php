<?php 
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$userAccountQuery = "SELECT * FROM User_Account WHERE user_id = ?";
$stmt_getUA = $conn->prepare($userAccountQuery);
$stmt_getUA->bind_param("s", $_SESSION['user_id']);
$stmt_getUA->execute();
$resultUA = $stmt_getUA->get_result();
$dataUA = $resultUA->fetch_assoc() ?: [];
$stmt_getUA->close();

$pageFieldUI = "SELECT * FROM Users_Info WHERE user_id = ?";
$stmt_getUI = $conn->prepare($pageFieldUI);
$stmt_getUI->bind_param("s", $_SESSION['user_id']);
$stmt_getUI->execute();
$resultUI = $stmt_getUI->get_result();
$dataUI = $resultUI->fetch_assoc() ?: [];
$stmt_getUI->close();

$pageIcon ='mdi-account-circle-outline';
$pageTitle = 'Profile';
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
                    <div class="row d-flex justify-content-center ">
                        <div class="col-md-9">
                            <div class="border border-1 border-black p-3 bg-C6D8E630">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img class="img-xlg rounded-circle" src="../images/faces/<?php echo $_SESSION['profile']; ?>"
                                            alt="Profile image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="profile-name mb-2"><?php echo htmlspecialchars($dataUI['name']); ?></div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span><i class="mdi mdi-map-marker"></i><?php echo htmlspecialchars($dataUI['complete_address']); ?></span>
                                            <span>Joined Date: July 26, 2024</span>
                                            <span><?php echo htmlspecialchars($dataUI['sex']); ?></span>
                                        </div>
                                        <div class="border border-1 border-gray"></div>
                                        <div class="d-flex justify-content-start py-2">
                                            <span class="me-5"><?php echo htmlspecialchars($dataUA['user_type']); ?></span>
                                            <span class="ms-5">Grade 10- Lilac</span>
                                        </div>
                                        <div class="border border-1 border-gray"></div>
                                        <div class="d-flex justify-content-start py-2 mb-4">
                                            <span class="me-5"><i class="mdi mdi-email me-2"></i><?php echo htmlspecialchars($dataUA['email']); ?></span>
                                            <span class="ms-5"><i class="mdi mdi-phone me-2"></i><?php echo htmlspecialchars($dataUI['cellphone']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-1 border-black profile-devider"></div>
                                <div class="profile-info mt-3 d-flex align-items-center gap-1 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0S112 64.5 112 144s64.5 144 144 144m128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128" />
                                    </svg>
                                    Account Info
                                </div>
                                <form action="">
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="row col-md-5 ">
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <h6 class="text-nowrap mx-2 ">Username</h6>
                                                <input type="text">
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between ">
                                                <h6 class="text-nowrap  mx-2">Password </h6>
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" d-flex justify-content-end mt-5">
                                        <button type="submit" class="btn btn-save">Save Changes</button>
                                        <button type="button" class="btn btn-cancel ms-2">Cancel</button>
                                        <a href="./logout.php" type="button" class="btn btn-logout ms-2">Logout</a>
                                    </div>
                                </form>
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