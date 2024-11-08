<?php
session_start();

include '../connection/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

$pageFieldFD = "SELECT * FROM Family_Data WHERE user_id = ?";
$stmt_getFD = $conn->prepare($pageFieldFD);
$stmt_getFD->bind_param("s", $_SESSION['user_id']);
$stmt_getFD->execute();
$resultFD = $stmt_getFD->get_result();
$dataFD = $resultFD->fetch_assoc() ?: [];
$stmt_getFD->close();

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
                        <div class="col-md-6 text-center">
                            <h4 class="fw-bold">Father</h4>
                            <p>(Mark + if deceased)</p>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Cellphone: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherCellphone"
                                        value="<?php echo htmlspecialchars($dataFD['father_cellphone'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Highest Educational Attainment: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherEducationalAttainment"
                                        value="<?php echo htmlspecialchars($dataFD['father_educational_attainment'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Occupation: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherOccupation"
                                        value="<?php echo htmlspecialchars($dataFD['father_occupation'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Business Address: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherBusinessAddress"
                                        value="<?php echo htmlspecialchars($dataFD['father_business_address'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Annual Income: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherAnnualIncome"
                                        value="<?php echo htmlspecialchars($dataFD['father_annual_income'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Language/s Spoken: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherLanguagesSpoken"
                                        value="<?php echo htmlspecialchars($dataFD['father_languages_spoken'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <label class="text-nowrap mx-2">Religion: </label>
                                    <input type="text" class="ssi-input w-100" id="fatherReligion"
                                        value="<?php echo htmlspecialchars($dataFD['father_religion'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="profile-info my-2 d-flex align-items-center gap-1 fw-bold">
                                Number of Brothers and Sisters
                            </div>
                            <p class="text-start">(Please name below siblings from eldest to youngest. Include
                                yourself.)</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4 class="fw-bold">Mother</h4>
                            <p>(Mark + if deceased)</p>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherCellphone"
                                        value="<?php echo htmlspecialchars($dataFD['mother_cellphone'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherEducationalAttainment"
                                        value="<?php echo htmlspecialchars($dataFD['mother_educational_attainment'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherOccupation"
                                        value="<?php echo htmlspecialchars($dataFD['mother_occupation'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherBusinessAddress"
                                        value="<?php echo htmlspecialchars($dataFD['mother_business_address'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherAnnualIncome"
                                        value="<?php echo htmlspecialchars($dataFD['mother_annual_income'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherLanguagesSpoken"
                                        value="<?php echo htmlspecialchars($dataFD['mother_languages_spoken'] ?? ''); ?>">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100" id="motherReligion"
                                        value="<?php echo htmlspecialchars($dataFD['mother_religion'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <h4 class="fw-bold">Name of Siblings</h4>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <h4 class="fw-bold">School/Place of Work </h4>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <h4 class="fw-bold">Birthday/Age</h4>
                            <div class="row w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-100">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex align-items-start gap-1 my-2 ">
                            <div class="fw-bold">
                                Parents
                            </div>
                            <p>(Please Check)</p>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="row w-75">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Living together</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Permanently separated</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Marriage Annulled/Legally Separated</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Father with another partner</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="row w-75">
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Temporarily separated</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Father OFW</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Mother OFW</label>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">
                                    <input type="text" class="ssi-input w-25">
                                    <label class="text-nowrap ms-2">Mother with another partner</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-end my-2 gap-1">
                            <a href="sii.php" class="btn-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M20.834 8.037L9.64 14.5c-1.43.824-1.43 2.175 0 3l11.194 6.463c1.43.826 2.598.15 2.598-1.5V9.537c0-1.65-1.17-2.326-2.598-1.5" />
                                </svg>
                                Prev Page
                            </a>
                            <a href="sii3.php" class="btn-next">Next Page
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
    <script>
        let inputInterval;

        document.querySelectorAll('.ssi-input, .ssi-checkbox').forEach(function (element) {
            element.addEventListener(element.type === 'checkbox' ? 'change' : 'input', function () {
                clearTimeout(inputInterval);
                inputInterval = setTimeout(function () {
                    saveStudentData();
                }, 1000);
            });
        });



        function saveStudentData() {
            var fatherCellphone = document.getElementById('fatherCellphone').value;
            var fatherEducationalAttainment = document.getElementById('fatherEducationalAttainment').value;
            var fatherOccupation = document.getElementById('fatherOccupation').value;
            var fatherBusinessAddress = document.getElementById('fatherBusinessAddress').value;
            var fatherAnnualIncome = document.getElementById('fatherAnnualIncome').value;
            var fatherLanguagesSpoken = document.getElementById('fatherLanguagesSpoken').value;
            var fatherReligion = document.getElementById('fatherReligion').value;

            var motherCellphone = document.getElementById('motherCellphone').value;
            var motherEducationalAttainment = document.getElementById('motherEducationalAttainment').value;
            var motherOccupation = document.getElementById('motherOccupation').value;
            var motherBusinessAddress = document.getElementById('motherBusinessAddress').value;
            var motherAnnualIncome = document.getElementById('motherAnnualIncome').value;
            var motherLanguagesSpoken = document.getElementById('motherLanguagesSpoken').value;
            var motherReligion = document.getElementById('motherReligion').value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_student_inventory2.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log("Data saved successfully:", xhr.responseText);
                } else {
                    console.error("Failed to save data:", xhr.status, xhr.statusText);
                }
            };

            var data = "&fatherCellphone=" + fatherCellphone +
                "&fatherEducationalAttainment=" + fatherEducationalAttainment +
                "&fatherOccupation=" + fatherOccupation +
                "&fatherBusinessAddress=" + fatherBusinessAddress +
                "&fatherAnnualIncome=" + fatherAnnualIncome +
                "&fatherLanguagesSpoken=" + fatherLanguagesSpoken +
                "&fatherReligion=" + fatherReligion + 
                "&motherCellphone=" + motherCellphone +
                "&motherEducationalAttainment=" + motherEducationalAttainment +
                "&motherOccupation=" + motherOccupation +
                "&motherBusinessAddress=" + motherBusinessAddress +
                "&motherAnnualIncome=" + motherAnnualIncome +
                "&motherLanguagesSpoken=" + motherLanguagesSpoken +
                "&motherReligion=" + motherReligion;

            xhr.send(data);
        }
    </script>
</body>

</html>