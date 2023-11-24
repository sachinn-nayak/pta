<?php
require('partials/top.inc.php');

if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] != true) {
    header("location: login.php");
    exit;
}

$sem = '';
$section = '';

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value_pta($conn, $_GET['type']);
    if ($type == 'view_sub') {
        $sem = get_safe_value_pta($conn, $_GET['sem']);
        $section = get_safe_value_pta($conn, $_GET['sec']);
    }
}

if ($sem == '' || $section == '') {
    header("location: student_attendance.php");
}
?>

<div class="container p-0">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">

                        <div class="card shadow m-auto">
                            <div class="card-header">
                                <h3><strong>Student Subject</strong></h3>
                            </div>
                            <div class="container table-responsive w-50 mt-3 mb-3">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">SI. No</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqlA = "SELECT * FROM `bcasub` WHERE `sem`='$sem'";

                                        $resA = mysqli_query($conn, $sqlA);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($resA)) {
                                            $i = $i + 1;
                                            echo '<tr>
                                                    <td scope="row">' . $i . '</td>
                                                    <td scope="row">' . $sem . '</td>
                                                    <td scope="row">' . $section . '</td>
                                                    <td scope="row">' . $row['subjectName'] . '</td>';
                                            $subject = $row['subjectName'];
                                            $sqlfind = "SHOW TABLES LIKE '$subject'";
                                            $resfind =  mysqli_query($conn, $sqlfind);
                                            if ($resfind) {
                                                if (mysqli_num_rows($resfind) > 0) {
                                                    echo '<td scope="row">
                                                            <a class="btn btn-primary" href="view_attendance.php?type=view_attendace&sem=' . $sem . '&sec=' . $section . '&sub=' . $row['subjectName'] . '">View Attendance</a>
                                                        </td>';
                                                } else {
                                                    echo '<td scope="row">
                                                            <a class="btn btn-primary disabled" disabled>View Attendance</a>
                                                        </td>
                                                        </tr>';
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("partials/_footer.php"); ?>