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

$pageFieldFD = "SELECT * FROM Family_Data WHERE user_id = ?";
$stmt_getFD = $conn->prepare($pageFieldFD);
$stmt_getFD->bind_param("s", $_SESSION['user_id']);
$stmt_getFD->execute();
$resultFD = $stmt_getFD->get_result();
$dataFD = $resultFD->fetch_assoc() ?: [];
$stmt_getFD->close();

$pageField = "SELECT * FROM Students_Individual_Inventory WHERE user_id = ?";
$stmt_get = $conn->prepare($pageField);
$stmt_get->bind_param("s", $_SESSION['user_id']);
$stmt_get->execute();
$result = $stmt_get->get_result();
$data = $result->fetch_assoc() ?: [];
$stmt_get->close();


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
                        <div class="col-md-12">
                            Dear Students: Kindly fill-out this form. The following information will aid the Guidance
                            Office develop a program to address your needs.
                            Rest assured that the information provided will be treated with utmost confidentiality.
                            Thank you.
                            <div class="border border-1 my-1 border-gray"></div>
                            <div class="profile-info my-1 d-flex align-items-center gap-1 fw-bold">
                                PERSONAL DATA
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center ">
                            <label class="text-nowrap me-2">LRN no.</label>
                            <input type="text" id="lrn" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['lrn_no'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="text-nowrap me-2">Date Filled</label>
                            <input type="date" id="dateFilled" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['date_filled'] ?? ''); ?>">
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <label class="text-nowrap me-2">Age</label>
                            <input type="number" id="age" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['age'] ?? ''); ?>">
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
                            <label class="text-nowrap me-2">Name</label>
                            <input type="text" id="name" class="ssi-input"
                                value="<?php echo htmlspecialchars($dataUI['name']); ?>">
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="text-nowrap me-2">Date Of Birth</label>
                            <input type="date" id="dob" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['date_of_birth'] ?? ''); ?>">
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="text-nowrap me-2">Nickname</label>
                            <input type="text" id="nickname" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['nickname'] ?? ''); ?>">
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <label class="text-nowrap me-2">Sex</label>
                            <select name="sex" id="sex" class="ssi-input">
                                <option value="">Select Sex</option>
                                <option value="Male" <?php echo (isset($dataUI['sex']) && $dataUI['sex'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($dataUI['sex']) && $dataUI['sex'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo (isset($dataUI['sex']) && $dataUI['sex'] === 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="text-nowrap me-2">Order of Birth</label>
                            <input type="number" id="oob" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['order_of_birth'] ?? ''); ?>">
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="text-nowrap me-2">Cellphone</label>
                            <input type="number" id="cp" class="ssi-input"
                                value="<?php echo htmlspecialchars($dataUI['cellphone'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="text-nowrap me-2">Email</label>
                            <input type="email" id="email" class="ssi-input"
                                value="<?php echo htmlspecialchars($dataUA['email'] ?? ''); ?>">
                        </div>

                        <div class="col-md-12 d-flex align-items-center">
                            <label class="text-nowrap me-2">Complete Address</label>
                            <input type="text" id="completeAddress" class="ssi-input"
                                value="<?php echo htmlspecialchars($dataUI['complete_address'] ?? ''); ?>">
                        </div>

                        <div class="col-md-12 d-flex align-items-center">
                            <label class="text-nowrap me-2">Languages/Dialects Spoken at Home</label>
                            <input type="text" id="languagesSpokenAtHome" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['languages_spoken_at_home'] ?? ''); ?>">
                        </div>

                        <div class="col-md-12 d-flex align-items-center">
                            <label class="text-nowrap me-2">Languages/Dialects Most Fluent In</label>
                            <input type="text" id="languagesMostFluentIn" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['languages_most_fluent_in'] ?? ''); ?>">
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="text-nowrap me-2">Religion from Birth</label>
                            <input type="text" id="religionFromBirth" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['religion_from_birth'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="text-nowrap me-2">Current Religion</label>
                            <input type="text" id="currentReligion" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['current_religion'] ?? ''); ?>">
                        </div>

                        <div class="col-md-12 d-flex align-items-center">
                            <label class="text-nowrap me-2">Personal Description (Marks):</label>
                            <input type="text" id="cersonalDescription" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['personal_description'] ?? ''); ?>">
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <label class="text-nowrap me-2">Your Favorite Subjects</label>
                            <input type="text" id="favoriteSubjects" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['favorite_subjects'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <label class="text-nowrap me-2">Your Most Difficult Subject </label>
                            <input type="text" id="mostDifficultSubject" class="ssi-input"
                                value="<?php echo htmlspecialchars($data['most_difficult_subject'] ?? ''); ?>">
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <label class="text-nowrap me-2">Inclination:</label>
                                <div class="row w-100">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <input type="checkbox" id="performanceArts" name="performanceArts"
                                            class="ssi-checkbox" value="1" <?php echo !empty($data['inclination_performance_arts']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2" for="performanceArts">Performance Arts</label>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center">
                                        <input type="checkbox" id="sports" class="ssi-checkbox" value="1" <?php echo !empty($data['inclination_sports']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Sports</label>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="classLeadership" class="ssi-checkbox" value="1" <?php echo !empty($data['inclination_class_leadership']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Class Leadership</label>
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <input type="checkbox" id="inclinationOthersCheckBox" class="ssi-checkbox">
                                        <label class="text-nowrap me-2">Others (Specify)</label>
                                        <input type="text" id="inclinationOthers" class="ssi-input w-100"
                                            value="<?php echo htmlspecialchars($data['inclination_others'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <label class="text-nowrap me-2">Interest:</label>
                                <div class="row w-100">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <input type="checkbox" id="religiousGroupings" class="ssi-checkbox" value="1"
                                            <?php echo !empty($data['interest_religious_groupings']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Religious Groupings</label>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center">
                                        <input type="checkbox" id="creativeArts" class="ssi-checkbox" value="1" <?php echo !empty($data['interest_creative_arts']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Creative Arts</label>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="declarationOration" class="ssi-checkbox" value="1"
                                            <?php echo !empty($data['interest_declaration_oration']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Declaration/Oration</label>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="acting" class="ssi-checkbox" value="1" <?php echo !empty($data['interest_acting']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Acting</label>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="singing" class="ssi-checkbox" value="1" <?php echo !empty($data['interest_singing']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Singing</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" id="interestOthersCheckbox" class="ssi-checkbox">
                                        <label class="text-nowrap me-2">Others (Specify)</label>
                                        <input type="text" id="interestOthers" class="ssi-input w-100"
                                            value="<?php echo htmlspecialchars($data['interest_others'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <label class="text-nowrap me-2">Wants to be:</label>
                                <div class="row w-100">
                                    <div class="col-md-1 d-flex align-items-center">
                                        <input type="checkbox" id="teacher" class="ssi-checkbox" value="1" <?php echo !empty($data['wants_to_be_teacher']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Teacher</label>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center">
                                        <input type="checkbox" id="doctorNurse" class="ssi-checkbox" value="1" <?php echo !empty($data['wants_to_be_doctor_nurse']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Doctor/Nurse </label>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="lawyer" class="ssi-checkbox" value="1" <?php echo !empty($data['wants_to_be_lawyer']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Lawyer</label>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="artist" class="ssi-checkbox" value="1" <?php echo !empty($data['wants_to_be_artist']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Artist</label>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-start">
                                        <input type="checkbox" id="militaryPolice" class="ssi-checkbox" value="1" <?php echo !empty($data['wants_to_be_military_police']) ? 'checked' : ''; ?>>
                                        <label class="text-nowrap ms-2">Military/Police</label>
                                    </div>
                                    <div class="col-md-5 d-flex align-items-center">
                                        <input type="checkbox" id="wantstobeOtherscheckbox" class="ssi-checkbox">
                                        <label class="text-nowrap me-2">Others</label>
                                        <input type="text" id="wantstobeOthers" class="ssi-input w-100"
                                            value="<?php echo htmlspecialchars($data['wants_to_be_others'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-info my-2 d-flex align-items-center gap-1 fw-bold">
                                FAMILY DATA
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4 class="fw-bold">Father</h4>
                            <p>(Mark + if deceased)</p>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Name:</label>
                                    <input type="text" id="fatherName" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['father_name'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Date of Birth:</label>
                                    <input type="date" id="fatherDOB" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['father_date_of_birth'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Place of Birth:</label>
                                    <input type="text" id="fatherPOB" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['father_place_of_birth'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Address:</label>
                                    <input type="text" id="fatherAddress" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['father_address'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4 class="fw-bold">Mother</h4>
                            <p>(Mark + if deceased)</p>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" id="motherName" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['mother_name'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="date" id="motherDOB" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['mother_date_of_birth'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" id="motherPOB" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['mother_place_of_birth'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" id="motherAddress" class="ssi-input w-100"
                                        value="<?php echo htmlspecialchars($dataFD['mother_address'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end my-2">
                            <a href="sii2.php" class="btn-next">Next Page
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M11.166 23.963L22.36 17.5c1.43-.824 1.43-2.175 0-3L11.165 8.037c-1.43-.826-2.598-.15-2.598 1.5v12.926c0 1.65 1.17 2.326 2.598 1.5z" />
                                </svg>
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
    <!-- <script src="./ssi.js"></script> -->

    <script>
        let inputInterval;

        document.addEventListener('DOMContentLoaded', function () {
            var inputField2 = document.getElementById('inclinationOthers');
            var checkbox2 = document.getElementById('inclinationOthersCheckBox');

            if (inputField2.value.trim() !== '') {
                checkbox2.checked = true;
            }
            inputField2.addEventListener('input', function () {
                if (inputField2.value.trim() === '') {
                    checkbox2.checked = false;
                } else {
                    checkbox2.checked = true;
                }
            });

            var inputField3 = document.getElementById('interestOthers');
            var checkbox3 = document.getElementById('interestOthersCheckbox');

            if (inputField3.value.trim() !== '') {
                checkbox3.checked = true;
            }
            inputField3.addEventListener('input', function () {
                if (inputField3.value.trim() === '') {
                    checkbox3.checked = false;
                } else {
                    checkbox3.checked = true;
                }
            });

            var inputField = document.getElementById('wantstobeOthers');
            var checkbox = document.getElementById('wantstobeOtherscheckbox');

            if (inputField.value.trim() !== '') {
                checkbox.checked = true;
            }
            inputField.addEventListener('input', function () {
                if (inputField.value.trim() === '') {
                    checkbox.checked = false;
                } else {
                    checkbox.checked = true;
                }
            });
        });

        document.querySelectorAll('.ssi-input, .ssi-checkbox').forEach(function (element) {
            element.addEventListener(element.type === 'checkbox' ? 'change' : 'input', function () {
                clearTimeout(inputInterval);
                inputInterval = setTimeout(function () {
                    saveStudentData();
                }, 1000);
            });
        });

        function saveStudentData() {
            var lrn = document.getElementById('lrn').value;
            var dateFilled = document.getElementById('dateFilled').value;
            var age = document.getElementById('age').value;
            var name = document.getElementById('name').value;
            var dob = document.getElementById('dob').value;
            var nickname = document.getElementById('nickname').value;
            var sex = document.getElementById('sex').value;
            var oob = document.getElementById('oob').value;
            var cp = document.getElementById('cp').value;
            var email = document.getElementById('email').value;
            var completeAddress = document.getElementById('completeAddress').value;
            var languagesSpokenAtHome = document.getElementById('languagesSpokenAtHome').value;
            var languagesMostFluentIn = document.getElementById('languagesMostFluentIn').value;
            var religionFromBirth = document.getElementById('religionFromBirth').value;
            var currentReligion = document.getElementById('currentReligion').value;
            var personalDescription = document.getElementById('cersonalDescription').value;
            var favoriteSubjects = document.getElementById('favoriteSubjects').value;
            var mostDifficultSubject = document.getElementById('mostDifficultSubject').value;

            // Collect checkbox data (true or false)
            var performanceArts = document.getElementById('performanceArts').checked ? 1 : 0;
            var sports = document.getElementById('sports').checked ? 1 : 0;
            var classLeadership = document.getElementById('classLeadership').checked ? 1 : 0;
            var inclinationOthers = document.getElementById('inclinationOthers').value;
            var religiousGroupings = document.getElementById('religiousGroupings').checked ? 1 : 0;
            var creativeArts = document.getElementById('creativeArts').checked ? 1 : 0;
            var declarationOration = document.getElementById('declarationOration').checked ? 1 : 0;
            var acting = document.getElementById('acting').checked ? 1 : 0;
            var singing = document.getElementById('singing').checked ? 1 : 0;
            var interestOthers = document.getElementById('interestOthers').value;
            var teacher = document.getElementById('teacher').checked ? 1 : 0;
            var doctorNurse = document.getElementById('doctorNurse').checked ? 1 : 0;
            var lawyer = document.getElementById('lawyer').checked ? 1 : 0;
            var artist = document.getElementById('artist').checked ? 1 : 0;
            var militaryPolice = document.getElementById('militaryPolice').checked ? 1 : 0;
            var wantstobeOthers = document.getElementById('wantstobeOthers').value;

            // Family Data             
            var fatherName = document.getElementById('fatherName').value;
            var fatherDOB = document.getElementById('fatherDOB').value;
            var fatherPOB = document.getElementById('fatherPOB').value;
            var fatherAddress = document.getElementById('fatherAddress').value;

            var motherName = document.getElementById('motherName').value;
            var motherDOB = document.getElementById('motherDOB').value;
            var motherPOB = document.getElementById('motherPOB').value;
            var motherAddress = document.getElementById('motherAddress').value;

            // Send data to PHP using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_student_inventory.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log("Data saved successfully:", xhr.responseText);
                } else {
                    console.error("Failed to save data:", xhr.status, xhr.statusText);
                }
            };

            var data = "&lrn=" + lrn +
                "&dateFilled=" + dateFilled +
                "&age=" + age +
                "&name=" + name +
                "&dob=" + dob +
                "&nickname=" + nickname +
                "&sex=" + sex +
                "&oob=" + oob +
                "&cp=" + cp +
                "&email=" + email +
                "&completeAddress=" + completeAddress +
                "&languagesSpokenAtHome=" + languagesSpokenAtHome +
                "&languagesMostFluentIn=" + languagesMostFluentIn +
                "&religionFromBirth=" + religionFromBirth +
                "&currentReligion=" + currentReligion +
                "&personalDescription=" + personalDescription +
                "&favoriteSubjects=" + favoriteSubjects +
                "&mostDifficultSubject=" + mostDifficultSubject +
                "&performanceArts=" + performanceArts +
                "&sports=" + sports +
                "&classLeadership=" + classLeadership +
                "&inclinationOthers=" + inclinationOthers +
                "&religiousGroupings=" + religiousGroupings +
                "&creativeArts=" + creativeArts +
                "&declarationOration=" + declarationOration +
                "&acting=" + acting +
                "&singing=" + singing +
                "&interestOthers=" + interestOthers +
                "&teacher=" + teacher +
                "&doctorNurse=" + doctorNurse +
                "&lawyer=" + lawyer +
                "&artist=" + artist +
                "&militaryPolice=" + militaryPolice +
                "&wantstobeOthers=" + wantstobeOthers +
                "&fatherName=" + fatherName +
                "&fatherDOB=" + fatherDOB +
                "&fatherPOB=" + fatherPOB +
                "&fatherAddress=" + fatherAddress +
                "&motherName=" + motherName +
                "&motherDOB=" + motherDOB +
                "&motherPOB=" + motherPOB +
                "&motherAddress=" + motherAddress;

            xhr.send(data);

        }
    </script>
</body>

</html>