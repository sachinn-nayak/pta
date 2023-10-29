<?php
require('partials/top.inc.php');

if (!isset($_SESSION['teacherLoggedIn']) || $_SESSION['teacherLoggedIn'] != true) {
  header("location: login.php");
  exit;
}
?>

<style>
    /* body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url(backsite.jpg);
    } */

    .content {
        margin-left: 0;
        transition: margin-left 0.5s;
        padding: 20px;
    }


    #menuIcon {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 30px;
        cursor: pointer;
        z-index: 1;
    }

    h1 {
        text-align: center;
    }

    p {
        text-align: center;
    }

    .features {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .feature {
        flex: 0 1 calc(33.33% - 20px);
        margin: 20px;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        background: linear-gradient(45deg, #fff 50%, #ddd 50%);
        transition: transform 0.3s;

    }

    .feature h3 {
        font-size: 24px;
        margin: 10px 0;
    }

    .feature p {
        font-size: 18px;
    }

    .feature h3 {
        font-size: 24px;
        margin: 10px 0;
        color: #333;

    }

    .feature p {
        font-size: 18px;

    }

    .feature:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }
</style>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="font-weight-bold text-primary">Teacher Section</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="features">
                    <div class="feature">
                        <a href="teacher_profile.php">
                            <h3>View Profile</h3>
                            <p></p>
                        </a>
                    </div>
                    <div class="feature">
                        <a href="view_exam.php"">
                            <h3>Enter Marks</h3>
                            <p></p>
                        </a>
                    </div>

                    <div class="feature">
                        <a href="view_classes.php">
                            <h3>Enter Attendance</h3>
                            <p></p>
                        </a>
                    </div>

                    <div class="feature">
                        <a href="view_student_class.php">
                            <h3>View student Details</h3>
                            <p></p>
                        </a>
                    </div>
                    
                    <div class="feature">
                        <a href="view_assigned_subject.php">
                            <h3>Assigned Subject</h3>
                            <p></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<?php include("partials/_footer.php"); ?>