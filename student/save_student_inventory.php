<?php
session_start();

include '../connection/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $lrn = $_POST['lrn'];
    $dateFilled = $_POST['dateFilled'];
    $age = $_POST['age'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $nickname = $_POST['nickname'];
    $sex = $_POST['sex'];
    $oob = $_POST['oob'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $completeAddress = $_POST['completeAddress'];
    $languagesSpokenAtHome = $_POST['languagesSpokenAtHome'];
    $languagesMostFluentIn = $_POST['languagesMostFluentIn'];
    $religionFromBirth = $_POST['religionFromBirth'];
    $currentReligion = $_POST['currentReligion'];
    $personalDescription = $_POST['personalDescription'];
    $favoriteSubjects = $_POST['favoriteSubjects'];
    $mostDifficultSubject = $_POST['mostDifficultSubject'];

    $performanceArts = isset($_POST['performanceArts']) ? $_POST['performanceArts'] : 0;
    $sports = isset($_POST['sports']) ? $_POST['sports'] : 0;
    $classLeadership = isset($_POST['classLeadership']) ? $_POST['classLeadership'] : 0;
    $inclinationOthers = $_POST['inclinationOthers'];
    $religiousGroupings = isset($_POST['religiousGroupings']) ? $_POST['religiousGroupings'] : 0;
    $creativeArts = isset($_POST['creativeArts']) ? $_POST['creativeArts'] : 0;
    $declarationOration = isset($_POST['declarationOration']) ? $_POST['declarationOration'] : 0;
    $acting = isset($_POST['acting']) ? $_POST['acting'] : 0;
    $singing = isset($_POST['singing']) ? $_POST['singing'] : 0;
    $interestOthers = $_POST['interestOthers'];
    $teacher = isset($_POST['teacher']) ? $_POST['teacher'] : 0;
    $doctorNurse = isset($_POST['doctorNurse']) ? $_POST['doctorNurse'] : 0;
    $lawyer = isset($_POST['lawyer']) ? $_POST['lawyer'] : 0;
    $artist = isset($_POST['artist']) ? $_POST['artist'] : 0;
    $militaryPolice = isset($_POST['militaryPolice']) ? $_POST['militaryPolice'] : 0;
    $wantstobeOthers = $_POST['wantstobeOthers'];

    // Family Data 
    $fatherName = $_POST['fatherName'];
    $fatherDOB = $_POST['fatherDOB'];
    $fatherPOB = $_POST['fatherPOB'];
    $fatherAddress = $_POST['fatherAddress'];

    $motherName = $_POST['motherName'];
    $motherDOB = $_POST['motherDOB'];
    $motherPOB = $_POST['motherPOB'];
    $motherAddress = $_POST['motherAddress'];

    if (!empty($_POST['name']) || !empty($_POST['sex']) || !empty($_POST['cp']) || !empty($_POST['completeAddress'])) {
        $userInfo = "UPDATE Users_Info SET name = ?, sex = ?, cellphone = ?, complete_address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($userInfo);
        $stmt->bind_param("sssss", $name, $sex, $cp, $completeAddress, $user_id);

        if ($stmt->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }


    if (!empty($_POST['email'])) {
        $userInfo = "UPDATE User_Account SET email = ? WHERE user_id = ?";
        $stmt = $conn->prepare($userInfo);
        $stmt->bind_param("ss", $email, $user_id);

        if ($stmt->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }

    $sql_check = "SELECT user_id FROM Students_Individual_Inventory WHERE user_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $user_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {

        $sql_update = "UPDATE Students_Individual_Inventory SET 
        lrn_no = ?, date_filled = ?, age = ?, date_of_birth = ?, nickname = ?, order_of_birth = ?, 
        languages_spoken_at_home = ?, languages_most_fluent_in = ?, religion_from_birth = ?, 
        current_religion = ?, personal_description = ?, favorite_subjects = ?, most_difficult_subject = ?, 
        inclination_performance_arts = ?, inclination_sports = ?, inclination_class_leadership = ?, 
        inclination_others = ?, interest_religious_groupings = ?, interest_creative_arts = ?, 
        interest_declaration_oration = ?, interest_acting = ?, interest_singing = ?, interest_others = ?, 
        wants_to_be_teacher = ?, wants_to_be_doctor_nurse = ?, wants_to_be_lawyer = ?, 
        wants_to_be_artist = ?, wants_to_be_military_police = ?, wants_to_be_others = ?
        WHERE user_id = ?";



        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param(
            "ssississsssssiiisiiiiisiiiiiss",
            $lrn,
            $dateFilled,
            $age,
            $dob,
            $nickname,
            $oob,
            $languagesSpokenAtHome,
            $languagesMostFluentIn,
            $religionFromBirth,
            $currentReligion,
            $personalDescription,
            $favoriteSubjects,
            $mostDifficultSubject,
            $performanceArts,
            $sports,
            $classLeadership,
            $inclinationOthers,
            $religiousGroupings,
            $creativeArts,
            $declarationOration,
            $acting,
            $singing,
            $interestOthers,
            $teacher,
            $doctorNurse,
            $lawyer,
            $artist,
            $militaryPolice,
            $wantstobeOthers,
            $user_id
        );

        if ($stmt_update->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {

        $sql = "INSERT INTO Students_Individual_Inventory (
            user_id, lrn_no, date_filled, age, date_of_birth, nickname, order_of_birth, 
            languages_spoken_at_home, languages_most_fluent_in, religion_from_birth, 
            current_religion, personal_description, favorite_subjects, most_difficult_subject, 
            inclination_performance_arts, inclination_sports, inclination_class_leadership, 
            inclination_others, interest_religious_groupings, interest_creative_arts, 
            interest_declaration_oration, interest_acting, interest_singing, interest_others, 
            wants_to_be_teacher, wants_to_be_doctor_nurse, wants_to_be_lawyer, wants_to_be_artist, 
            wants_to_be_military_police, wants_to_be_others
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param(
            "sssississssssssiisiiiiisiiiiis",
            $user_id,
            $lrn,
            $dateFilled,
            $age,
            $dob,
            $nickname,
            $oob,
            $languagesSpokenAtHome,
            $languagesMostFluentIn,
            $religionFromBirth,
            $currentReligion,
            $personalDescription,
            $favoriteSubjects,
            $mostDifficultSubject,
            $performanceArts,
            $sports,
            $classLeadership,
            $inclinationOthers,
            $religiousGroupings,
            $creativeArts,
            $declarationOration,
            $acting,
            $singing,
            $interestOthers,
            $teacher,
            $doctorNurse,
            $lawyer,
            $artist,
            $militaryPolice,
            $wantstobeOthers
        );

        if ($stmt->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $sqlFamilyData = "SELECT user_id FROM Family_Data WHERE user_id = ?";
    $stmtFamilyData = $conn->prepare($sqlFamilyData);
    $stmtFamilyData->bind_param("s", $user_id);
    $stmtFamilyData->execute();
    $stmtFamilyData->store_result();

    if ($stmtFamilyData->num_rows > 0) {
        $sql_update = "UPDATE Family_Data SET 
        father_name = ?, father_date_of_birth = ?, father_place_of_birth = ?, father_address = ?,
        mother_name = ?, mother_date_of_birth = ?, mother_place_of_birth = ?, mother_address = ?
        WHERE user_id = ?";

        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param(
            "sssssssss",
            $fatherName,
            $fatherDOB,
            $fatherPOB,
            $fatherAddress,
            $motherName,
            $motherDOB,
            $motherPOB,
            $motherAddress,
            $user_id
        );

        if ($stmt_update->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        $sql_insert = "INSERT INTO Family_Data (
            user_id, father_name, father_date_of_birth, father_place_of_birth, father_address,
            mother_name, mother_date_of_birth, mother_place_of_birth, mother_address
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_insert = $conn->prepare($sql_insert);

        // Bind parameters for the insert statement
        $stmt_insert->bind_param(
            "sssssssss",
            $user_id,
            $fatherName,
            $fatherDOB,
            $fatherPOB,
            $fatherAddress,
            $motherName,
            $motherDOB,
            $motherPOB,
            $motherAddress
        );

        if ($stmt_insert->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . $stmt_insert->error;
        }
        $stmt_insert->close();
    }

    $conn->close();
}
?>