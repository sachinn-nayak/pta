<?php
require('partials/top.inc.php');

if (!isset($_SESSION['studentLoggedIn']) || $_SESSION['studentLoggedIn'] != true) {
    header("location: login.php");
    exit;
}
// $week = date("D");
// $today = date("Md");
$today = 'Oct14';
$week = 'Mon';
$studentID = $_SESSION['studentID'];
$sqldis = "SELECT * FROM `studentdetails` WHERE `registerNo`='$studentID'";
$resdis = mysqli_query($conn, $sqldis);
while ($rowdis = mysqli_fetch_assoc($resdis)) {
    $sem = $rowdis['sem'];
    $sec = $rowdis['section'];
}
if ($sem == 1) {
    $tableName = "firstBca";
} else if ($sem == 3) {
    $tableName = "thirdBca";
} else if ($sem == 5) {
    $tableName = "fifthBca";
} else if ($sem == 2) {
    $tableName = "secondBca";
} else if ($sem == 4) {
    $tableName = "fourthBca";
} else if ($sem == 6) {
    $tableName = "sixthBca";
}
$tableName = $tableName . $sec;
$alreadyExists = false;
$subName = [];
?>

<div class="container">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row m-0">
                <div class="col-lg-12 p-0">
                    <div class="container">

                        <div class="card shadow m-auto">
                            <div class="card-header">
                                <h3><strong>My Attendance Details</strong><small></small></h3>
                            </div>

                            <div class="container-fluid table-responsive m-0 mt-2 mb-3">
                                <table class="table display table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Week</th>
                                            <th scope="col">9.00 - 9.55</th>
                                            <th scope="col">10.00 - 10.55</th>
                                            <th scope="col">11.00 - 11.55</th>
                                            <th scope="col">12.00 - 12.55</th>
                                            <th scope="col">13.00 - 13.55</th>
                                            <th scope="col">14.00 - 14.55</th>
                                            <th scope="col">15.00 - 15.55</th>
                                            <th scope="col">16.00 - 16.55</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqltt = "SELECT * FROM `$tableName` WHERE `week`='$week'";
                                        $restt = mysqli_query($conn, $sqltt);
                                        if ($restt) {
                                            while ($row = mysqli_fetch_assoc($restt)) {
                                                echo '<tr>
                                                <th scope="col">' . $row['week'] . '</th>
                                                <td scope="row">' . $row['9.00-9.55'] . '</td>
                                                <td scope="row">' . $row['10.00-10.55'] . '</td>
                                                <td scope="row">' . $row['11.00-11.55'] . '</td>
                                                <td scope="row">' . $row['12.00-12.55'] . '</td>
                                                <td scope="row">' . $row['13.00-13.55'] . '</td>
                                                <td scope="row">' . $row['14.00-14.55'] . '</td>
                                                <td scope="row">' . $row['15.00-15.55'] . '</td>
                                                <td scope="row">' . $row['16.00-16.55'] . '</td>
                                            </tr>';
                                                $subName[] = $row['9.00-9.55'];
                                                $subName[] = $row['10.00-10.55'];
                                                $subName[] = $row['11.00-11.55'];
                                                $subName[] = $row['12.00-12.55'];
                                                $subName[] = $row['14.00-14.55'];
                                                $subName[] = $row['15.00-15.55'];
                                                $subName[] = $row['16.00-16.55'];
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <?php
                                            $status = [];
                                            $taken = 0;
                                            $totalAttended = 0;
                                            for ($i = 0; $i < count($subName); $i++) {
                                                if ($subName[$i] == 'Free' || $subName[$i] == 'Same') {
                                                    continue;
                                                }
                                                $sqlDate = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$subName[$i]' AND COLUMN_NAME = '$today'";
                                                // echo $sqlDate. '<br>';
                                                $resDate = mysqli_query($conn, $sqlDate);
                                                if (mysqli_num_rows($resDate) > 0) {
                                                    $alreadyExists = true;
                                                    $sqlcheck = "SELECT `studentID`,`$today` FROM `$subName[0]` WHERE `studentID`='$studentID'";
                                                    // echo $sqlcheck;
                                                    $rescheck = mysqli_query($conn, $sqlcheck);
                                                    while ($rowcheck = mysqli_fetch_assoc($rescheck)) {
                                                        $status[$i] = $rowcheck[$today];
                                                    }
                                                }
                                            }
                                            if ($alreadyExists) {
                                            ?>
                                                <th scope="col">Status</th>
                                                <td scope="row">
                                                    <?php if ($subName[0] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[0] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[0]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[0];
                                                            if ($status[0]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">
                                                    <?php if ($subName[1] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[1] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[1]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[1];
                                                            if ($status[1]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">
                                                    <?php if ($subName[2] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[2] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[2]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[2];
                                                            if ($status[2]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">
                                                    <?php if ($subName[3] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[3] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[3]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[3];
                                                            if ($status[3]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">Lunch</td>
                                                <td scope="row">
                                                    <?php if ($subName[4] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[4] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[4]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[4];
                                                            if ($status[4]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">
                                                    <?php if ($subName[5] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[5] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[5]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[5];
                                                            if ($status[5]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                                <td scope="row">
                                                    <?php if ($subName[6] == 'Free') {
                                                        echo 'Free';
                                                    } elseif ($subName[6] == 'Same') {
                                                        echo 'Same';
                                                    } else {
                                                        $taken = $taken + 1;
                                                        if ($status[6]=='Empty'){
                                                            echo 'Pending';
                                                        } else {
                                                            echo $status[6];
                                                            if ($status[6]=='Present'){
                                                                $totalAttended = $totalAttended + 1;
                                                            }

                                                        }
                                                    } ?>
                                                </td>
                                            </tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <th scope="col">
                                                        Status
                                                    </th>
                                                    <td colspan="8">
                                                        <p class="center">Attendance yet not entered</p>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <th scope="col">
                                                    Report
                                                </th>
                                                <td colspan="6">
                                                    Total Taken 
                                                </td>
                                                <td colspan="2"><?php echo $taken; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    Report
                                                </th>
                                                <td colspan="6">
                                                    Total Attended 
                                                </td>
                                                <td colspan="2"><?php echo $totalAttended; ?></td>
                                            </tr>
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