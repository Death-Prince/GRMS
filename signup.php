<?php
include 'connection/config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM User_Account WHERE username = ? OR email = ? OR user_id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("sss", $username, $email, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error[] = 'Username, email, or ID number already exists!';
    } else {
        $insert = "INSERT INTO User_Account (user_id, email, username, password, user_type, profile) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $profile = 'default.png';

        $stmt->bind_param("ssssss", $user_id, $email, $username, $password, $usertype, $profile);


        if ($stmt->execute()) {
            // Insert into Users_Info
            $insertui = "INSERT INTO Users_Info (user_id, name) VALUES (?, ?)";
            $stmt = $conn->prepare($insertui);
            $stmt->bind_param("ss", $user_id, $name);

            if ($stmt->execute()) {
                header('Location: index.php?signup_success');
                exit();
            } else {
                $error[] = 'Failed to insert user information. Please try again.';
            }
        } else {
            $error[] = 'Registration failed. Please try again.';
        }
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
                            <div class="brand-logo d-flex justify-content-center mx-4 mx-sm-5">
                                <img src="./images/logo.png" style="width: 70px;" alt="logo">
                            </div>
                            <div class="border border-1 border-gray "></div>
                            <h4 class="font-weight-normal m-3 text-center">Sign Up</h4>
                            <form action="" method="post" class="mx-4 mx-sm-5">
                                <div class="form-group">
                                    <div>User Info:</div>

                                    <input type="text" name="name" class="form-control form-control-md mb-2"
                                        id="exampleInputName" placeholder="Name">

                                    <input type="email" name="email" class="form-control form-control-md mb-2"
                                        id="exampleInputEmail1" placeholder="Email Address">

                                    <select name="usertype" id="userType" class="form-control form-control-md mb-2">
                                        <option value="Teacher">Teacher</option>
                                        <option value="Student">Student</option>
                                    </select>

                                    <input type="text" name="user_id" class="form-control form-control-md mb-2"
                                        id="exampleInputID" placeholder="Student ID No. / Teacher ID No.">
                                </div>

                                <div class="form-group">
                                    <div>User Account:</div>

                                    <input type="text" name="username" class="form-control form-control-md mb-2"
                                        id="exampleInputUsername" placeholder="Username">

                                    <input type="password" name="password" class="form-control form-control-md mb-2"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="mb-1 d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn-block btn-facebook px-5">
                                        Submit
                                    </button>
                                </div>

                                <div class="text-center mt-2 fw-light d-flex justify-content-between">
                                    Already have an Account? <a href="index.php" class="text-black">Log in</a>
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