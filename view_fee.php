<?php
require('partials/top.inc.php');

if (!isset($_SESSION['studentLoggedIn']) || $_SESSION['studentLoggedIn'] != true) {
    header("location: login.php");
    exit;
}

$studentID = $_SESSION['studentID'];

?>

<div class="container m-auto p-0">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row m-0">
                <div class="col-lg-12 p-0">
                    <div class="container mt-3 mb-3">

                        <div class="card shadow m-auto">
                            <div class="card-header">
                                <h3><strong>View My Fee Details</strong><small></small></h3>
                            </div>

                            <div class="container table-responsive m-0 mt-2 mb-3">
                                <table class="table display table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Student ID</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Fee Amount</th>
                                            <th scope="col">Paid Amount</th>
                                            <th scope="col">Balance Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `studentdetails` WHERE `registerNo`='$studentID'";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo '<tr>
                                                <td scope="row">' . $row['registerNo'] . '</td>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['sem'] . '</td>
                                                <td>' . $row['section'] . '</td>
                                                <td>' . $row['feeAmount'] . '</td>
                                                <td>' . $row['paidFeeAmount'] . '</td>';
                                            $balance = $row['feeAmount'] - $row['paidFeeAmount'];
                                            echo '<td>' . $balance . '</td>
                                            </tr>';
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