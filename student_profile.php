<?php
require('partials/top.inc.php');

if (!isset($_SESSION['studentLoggedIn']) || $_SESSION['studentLoggedIn'] != true) { ?>
    <script>
        window.location.href = "login.php";
    </script>
<?php
    exit;
}

$updateSuccess = false;
$matchError = '';
$currentError = '';
$studentID = $_SESSION['studentID'];
$teacherName = '';
$firstName = '';
$lastName = '';
$email = '';
$phoneNo = '';
$sem = '';
$section = '';
$fathersName = '';
$mothersName = '';
$sql = "SELECT * FROM `studentdetails` WHERE `registerNo`='$studentID'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $studentName = $row['name'];
    $nameParts = explode(" ", $studentName);
    $firstName = $nameParts[0];
    $lastName = $nameParts[1];
    $email = $row['email'];
    $phoneNo = $row['phoneNo'];
    $sem = $row['sem'];
    $section = $row['section'];
    $fathersName = $row['fathersName'];
    $mothersName = $row['mothersName'];
}
if (isset($_POST['updateStudentPassword'])) {
    $currentPassword = get_safe_value_pta($conn, $_POST['currentPassword']);
    $newPassword = get_safe_value_pta($conn, $_POST['newPassword']);
    $confirmPassword = get_safe_value_pta($conn, $_POST['confirmPassword']);
    $sqlUp = "SELECT `studentPassword` FROM `studentlogin` WHERE `studentrID`='$studentID'";
    $resUp = mysqli_query($conn, $sqlUp);

    if ($resUp) {
        while ($rowUp = mysqli_fetch_assoc($resUp)) {
            $storedPassword = $rowUp['studentPassword'];
        }

        if (password_verify($currentPassword, $storedPassword)) {
            if ($newPassword === $confirmPassword) {
                // Hash the new password before storing it
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $updateSql = "UPDATE `studentlogin` SET `studentPassword` = '$hashedNewPassword' WHERE `teacherID`='$teacherID'";
                $updateResult = mysqli_query($conn, $updateSql);

                if ($updateResult) {
                    $updateSuccess = true;
                } else {
                    $updateSuccess = false;
                }
            } else {
                $matchError = "New password and confirm password do not match.";
            }
        } else {
            $currentError = "Current password is incorrect.";
        }
    } else {
        $updateSuccess = false;;
    }
}


?>

<div class="container">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container m-3">
                        <div class="card shadow m-auto">
                            <div class="card-header">
                                <h3><strong>Your Profile</strong></h3>
                            </div>

                            <div class="container mb-3">
                                <form class="row g-3 m-2">
                                    <div class="col-md-2">
                                        <label for="registerNo" class="form-label">Register No</label>
                                        <input type="text" maxlength="7" class="form-control" id="registerNo" name="registerNo" value="<?php echo $studentID; ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="firstName" class="form-label">Frist Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fatherName" class="form-label">Father Name</label>
                                        <input type="text" class="form-control" id="fatherName" name="fatherName" value="<?php echo $fathersName; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="motherName" class="form-label">Mother Name</label>
                                        <input type="text" class="form-control" id="motherName" name="motherName" value="<?php echo $mothersName; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="course" class="form-label">Course</label>
                                        <input type="text" class="form-control" id="course" name="course" value="BCA">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sem" class="form-label">Semester</label>
                                        <input id="sem" class="form-control" name="sem" value="<?php echo $sem; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="section" class="form-label">Section</label>
                                        <input id="section" class="form-control" name="section" value="<?php echo $section; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phoneNo" class="form-label">Phone No</label>
                                        <input type="tel" class="form-control" id="phoneNo" name="phoneNo" value="<?php echo $phoneNo; ?>">
                                    </div>
                                </form>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card shadow m-auto">
                            <div class="card-header">
                                <h3><small>Change Password</small></h3>
                            </div>
                            <div class="container mb-3">
                                <form class="row g-3 m-2" action="teacher_profile.php" method="post">
                                    <div class="col-md-12 mt-2">
                                        <label for="currentPassword" class="form-label">Current Password :
                                        </label>
                                        <input type="password" class="form-control w-50" id="currentPassword" name="currentPassword">
                                        <p class="error"><?php echo $currentError; ?></p>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label for="newpassword" class="form-label">Password : </label>
                                        <input type="password" class="form-control w-50" id="newPassword" name="newPassword">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="confirmPassword" class="form-label">Confirm Password :
                                        </label>
                                        <input type="password" class="form-control w-50" id="confirmPassword" name="confirmPassword">
                                        <p class="error"><?php echo $matchError; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" class="btn btn-primary" name="updateStudentPassword" value="Update">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>