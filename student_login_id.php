<?php
require('partials/top.inc.php');

if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] != true) {
    header("location: login.php");
    exit;
}
$delete = false;
if (isset($_GET['operation'])) {
    $studentID = get_safe_value_pta($conn, $_GET["studentID"]);
    $sql = "DELETE FROM `studentlogin` WHERE `studentID`='$studentID'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $delete = true;
    }
}

if ($delete) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Deleted sucesssfull!</strong>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
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
                                <h3><strong>Student ID</strong></h3>
                            </div>
                            <div class="container table-responsive w-50 mt-3 mb-3">
                                <table class="table table-striped table-hover table-bordered" id="myTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">SI. No</th>
                                            <th scope="col">Login Id</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqlA = "SELECT `id`, `studentID` FROM `studentlogin`";
                                        $resA = mysqli_query($conn, $sqlA);
                                        $secAa = [];
                                        $semA = '';
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($resA)) {
                                            $i = $i + 1;
                                            echo '<tr>
                                                    <td scope="row">' . $i . '</td>
                                                    <td scope="row">' . $row['studentID'] . '</td>
                                                    <td scope="row">
                                                    <a class="btn btn-danger" href="?operation=delete_studentID&studentID=' . $row['studentID'] . '">Delete</a>
                                                </td>';
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



<?php
require('partials/_footer.php');
?>