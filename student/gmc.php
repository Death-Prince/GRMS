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
                    <div class="row d-flex justify-content-center">
                        <div class="custom-table-gmc">
                            <table class="table">
                                <thead>
                                    <th>Date Record</th>
                                    <th>Fullname</th>
                                    <th>Date release</th>
                                    <th>Student's Behavior <br> Record</th>
                                    <th>status</th>
                                    <th>Recipient</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jan. 13, 2024</td>
                                        <td>Jane Lee</td>
                                        <td>Jun. 16, 2024</td>
                                        <td>No Record</td>
                                        <td>Complete</td>
                                        <td>May Lee / Mother</td>
                                        <td>
                                            <i class="mdi mdi-account-search menu-icon"></i>
                                            <i class="mdi mdi-account-switch menu-icon"></i>
                                            <i class="mdi mdi-trash-can-outline menu-icon"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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