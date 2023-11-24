<?php
require('partials/connection.inc.php');
require('partials/function.inc.php');
session_start();
// Check if the user is logged in. You can use any authentication method you prefer.
if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] != true) {
    if (!isset($_SESSION['teacherLoggedIn']) || $_SESSION['teacherLoggedIn'] != true) { 
        if (!isset($_SESSION['studentLoggedIn']) || $_SESSION['studentLoggedIn'] != true) {
    ?>
        <script>
            window.location.href = "login.php";
        </script>
<?php
    }
}

// Check if the form is submitted
if (isset($_POST['updateTeacherPassword'])) {
    // Get input values
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Fetch the current user's password from the database
    $teacherId = $_SESSION['teacherID'];
    $sql = "SELECT `password` FROM `teacherlogin` WHERE `teacherID` = '$teacherId'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        
        // Verify if the current password matches the stored password
        if (password_verify($currentPassword, $storedPassword)) {
            if ($newPassword === $confirmPassword) {
                // Hash the new password before storing it
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                // Update the user's password in the database
                $updateSql = "UPDATE `teacherlogin` SET `teacherPassword` = '$hashedNewPassword' WHERE `teacherID` = '$userId'";
                $updateResult = mysqli_query($conn, $updateSql);
                
                if ($updateResult) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "Error fetching the user's data.";
    }
}

if (isset($_POST['updateStudentPassword'])) {

    // Get input values
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Fetch the current user's password from the database
    $studentId = $_SESSION['studentID'];
    $sql = "SELECT `studentPassword` FROM `studentlogin` WHERE `studentID` = '$studentID'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        
        // Verify if the current password matches the stored password
        if (password_verify($currentPassword, $storedPassword)) {
            if ($newPassword === $confirmPassword) {
                // Hash the new password before storing it
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                // Update the user's password in the database
                $updateSql = "UPDATE `studentlogin` SET `studentPassword` = '$hashedNewPassword' WHERE `studentID` = '$studentID'";
                $updateResult = mysqli_query($conn, $updateSql);
                
                if ($updateResult) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "Error fetching the user's data.";
    }
}

?>