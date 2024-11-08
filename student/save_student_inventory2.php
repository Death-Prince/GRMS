<?php
session_start();

include '../connection/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $fatherCellphone = $_POST['fatherCellphone'];
    $fatherEducationalAttainment = $_POST['fatherEducationalAttainment'];
    $fatherOccupation = $_POST['fatherOccupation'];
    $fatherBusinessAddress = $_POST['fatherBusinessAddress'];
    $fatherAnnualIncome = $_POST['fatherAnnualIncome'];
    $fatherLanguagesSpoken = $_POST['fatherLanguagesSpoken'];
    $fatherReligion = $_POST['fatherReligion'];

    $motherCellphone = $_POST['motherCellphone'];
    $motherEducationalAttainment = $_POST['motherEducationalAttainment'];
    $motherOccupation = $_POST['motherOccupation'];
    $motherBusinessAddress = $_POST['motherBusinessAddress'];
    $motherAnnualIncome = $_POST['motherAnnualIncome'];
    $motherLanguagesSpoken = $_POST['motherLanguagesSpoken'];
    $motherReligion = $_POST['motherReligion'];

    $sqlFamilyData2 = "SELECT user_id FROM Family_Data WHERE user_id = ?";
    $stmtFamilyData2 = $conn->prepare($sqlFamilyData2);
    $stmtFamilyData2->bind_param("s", $user_id);
    $stmtFamilyData2->execute();
    $stmtFamilyData2->store_result();

    if ($stmtFamilyData2->num_rows > 0) {
        $sql_update = "UPDATE Family_Data SET 
        father_cellphone = ?, father_educational_attainment = ?, father_occupation = ?, father_business_address = ?, father_annual_income = ?, father_languages_spoken = ?, father_religion = ?,
        mother_cellphone = ?, mother_educational_attainment = ?, mother_occupation = ?, mother_business_address = ?, mother_annual_income = ?, mother_languages_spoken = ?, mother_religion = ?
        WHERE user_id = ?";

        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param(
            "sssssssssssssss",
            $fatherCellphone,
            $fatherEducationalAttainment,
            $fatherOccupation,
            $fatherBusinessAddress,
            $fatherAnnualIncome,
            $fatherLanguagesSpoken,
            $fatherReligion,

            $motherCellphone,
            $motherEducationalAttainment,
            $motherOccupation,
            $motherBusinessAddress,
            $motherAnnualIncome,
            $motherLanguagesSpoken,
            $motherReligion,
            $user_id
        );

        if ($stmt_update->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . $stmt_update->error;
        }
        $stmt_update->close();
    }

    $conn->close();
}
?>