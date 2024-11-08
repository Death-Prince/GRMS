<?php
include 'connection/config.php';

session_start();
if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['user_type']) {
        case 'Admin':
            header('Location: admin/index.php');
            exit();
        case 'Instructor':
            header('Location: instructor/index.php');
            exit();
        case 'Student':
            header('Location: student/index.php');
            exit();
    }
}


if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $select = "SELECT * FROM User_Account WHERE username = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['profile'] = $row['profile'];

            $updateStatus = "UPDATE User_Account SET status = 'Active' WHERE user_id = ?";
            $stmt = $conn->prepare($updateStatus);
            $stmt->bind_param("s", $row['user_id']);
            $stmt->execute();

            switch ($row['user_type']) {
                case 'Admin':
                    header('location: admin/index.php');
                    break;
                case 'Instructor':
                    header('location: instructor/index.php');
                    break;
                case 'Student':
                    header('location: student/index.php');
                    break;
                default:
                    $error[] = 'Invalid user type!';
                    break;
            }
        } else {
            $error[] = 'Incorrect username or password!';
        }
    } else {
        $error[] = 'Incorrect username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GRMS </title>
    <link rel="stylesheet" href="./vendors/feather/feather.css">
    <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./vendors/typicons/typicons.css">
    <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/custom.css">
    <link rel="shortcut icon" href="./images/logo.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0 linear-bg">
                <div class="row w-100 mx-0 ">
                    <div class="col-lg-3 mx-auto">
                        <?php
                        if (!empty($error)) {
                            foreach ($error as $err) {
                                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">' . $err . '</div>';
                            }
                        }
                        ?>
                        <div class="auth-form-light text-left py-5 ">
                            <div class="brand-logo d-flex justify-content-center mx-2 mx-sm-5">
                                <img src="./images/logo.png" class="img-fluid" style="width: 140px;" alt="logo">
                            </div>
                            <div class="border border-1 border-gray "></div>
                            <form action="" method="post" class="pt-3  mx-2 mx-sm-5">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-md"
                                        id="exampleInputEmail1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-md" name="password"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Show password
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-gray text-decoration-none">Forgot password?</a>
                                </div>
                                <div class="mb-2 d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn-block btn-facebook px-5">
                                        Submit
                                    </button>
                                </div>
                                <div class="text-center mt-4 fw-light d-flex justify-content-between">
                                    Don't have an account? <a href="signup.php" class="text-black">Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./js/off-canvas.js"></script>
    <script src="./js/hoverable-collapse.js"></script>
    <script src="./js/template.js"></script>
    <script src="./js/settings.js"></script>
    <script src="./js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>