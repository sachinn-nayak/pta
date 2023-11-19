<?php
require('partials/top.inc.php');

if (!isset($_SESSION['studentLoggedIn']) || $_SESSION['studentLoggedIn'] != true) { ?>
    <script>
        window.location.href = "login.php";
    </script>
<?php
}

$update = false;
$error = false;
$studentID = $_SESSION['studentID'];
$total = 0;
$obtained = 0;

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value_pta($conn, $_GET['type']);
    if ($type == 'first') {
        $totalMarks = 25;
    }
    if ($type == 'second') {
        $totalMarks = 50;
    }
}

?>

<div class="container">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row m-0">
                <div class="col-lg-12 p-0">
                    <div class="container">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3><strong>View Student Marks</strong></h3>
                            </div>
                            <div class="container table-responsive mt-2 mb-3">

                                <table class="table table-striped table-hover table-bordered w-50 m-auto">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">SI. No</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Obtained Marks</th>
                                            <th scope="col">Total Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($type == 'first') {
                                            $sqltt = "SELECT * FROM `firstinternalmarks` WHERE `studentID` = '$studentID' ORDER BY `subject`";
                                            $restt = mysqli_query($conn, $sqltt);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($restt)) {
                                                $i = $i + 1;
                                                $total = $total + 25;
                                                $obtained = $obtained + $row['marks'];
                                                echo '<tr>
                                                    <td scope="row">' . $i . '</td>
                                                    <td scope="row">' . $row['subject'] . '</td>
                                                    <td scope="row">' . $row['marks'] . '</td>
                                                    <td scope="row">' . $totalMarks . '</td>
                                                </tr>';
                                            }
                                        } else {
                                            $sqltt = "SELECT * FROM `secondinternalmarks` WHERE `studentID` = '$studentID' ORDER BY `subject`";
                                            $restt = mysqli_query($conn, $sqltt);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($restt)) {
                                                $i = $i + 1;
                                                $total = $total + 50;
                                                $obtained = $obtained + $row['marks'];
                                                echo '<tr>
                                                    <td scope="row">' . $i . '</td>
                                                    <td scope="row">' . $row['subject'] . '</td>
                                                    <td scope="row">' . $row['marks'] . '</td>
                                                    <td scope="row">' . $totalMarks . '</td>
                                                </tr>';
                                            }
                                        }
                                        echo '<tr>
                                        <td scope="row"></td>
                                        <td scope="row">Total</td>
                                        <td scope="row">' . $obtained . '</td>
                                        <td scope="row">' . $total . '</td>
                                    </tr>';
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

<?php
require('partials/_footer.php');
?>