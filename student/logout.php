<?php
session_start();
include '../connection/config.php';

if (isset($_SESSION['user_id'])) {

    $updateStatus = "UPDATE User_Account SET status = 'Offline' WHERE user_id = ?";
    $stmt = $conn->prepare($updateStatus);

    if ($stmt) {
        $stmt->bind_param("s", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
    }

    session_unset();
    session_destroy();
}

header('Location: ../index.php?logout_success');
exit();
?>