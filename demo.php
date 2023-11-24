<?php

if (isset($_GET['type']) && $_GET['type'] != '') {
    $sem = $_GET['sem'];
}

?>

<div class="container w-75 mt-3 mb-3">
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">SI. No</th>
                <th scope="col">Semester</th>
                <th scope="col">Subject</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlSub = "SELECT * FROM `subname` where `sem`='$sem'";
            $resSub = mysqli_query($conn, $sqlSub);
            $i = 0;
            while ($rowSub = mysqli_fetch_assoc($resSub)) {
                $i = $i + 1;
                echo '<tr>
                        <td scope="row">' . $i . '</td>
                        <td scope="row">' . $rowSub['sem'] . '</td>
                        <td scope="row">' . $rowSub['sub'] . '</td>
                    </tr>';
            }
            ?>

        </tbody>
    </table>
</div>