<?php
require('partials/connection.inc.php');
require('partials/function.inc.php');
session_start();
?>
<!doctype html>
<html class="" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset=" utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">    
    <link rel="stylesheet" href="css/stylebs.css">
    <link rel="stylesheet" href="/pta/css/custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/b-2.4.2/datatables.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="
            <?php if (isset($_SESSION['login'])) {
                if (isset($_SESSION['adminLoggedIn'])) {
                    echo 'admin.php';
                } elseif (isset($_SESSION['teacherLoggedIn'])) {
                    echo 'teacher.php';
                } elseif (isset($_SESSION['studentLoggedIn'])) {
                    echo 'student.php';
                }
            }
            ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PTA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php if (isset($_SESSION['login'])) {
                if (isset($_SESSION['adminLoggedIn'])) {
                    echo 'admin.php';
                } elseif (isset($_SESSION['teacherLoggedIn'])) {
                    echo 'teacher.php';
                } elseif (isset($_SESSION['studentLoggedIn'])) {
                    echo 'student.php';
                }
            }
            ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span><?php if (isset($_SESSION['login'])) {
                if (isset($_SESSION['adminLoggedIn'])) {
                    echo 'Admin';
                } elseif (isset($_SESSION['teacherLoggedIn'])) {
                    echo 'Teacher';
                } elseif (isset($_SESSION['studentLoggedIn'])) {
                    echo 'Student';
                }
            }
            ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if (isset($_SESSION['login'])) { 
                if (isset($_SESSION['adminLoggedIn'])) { ?> 
            <!-- Heading -->
            <div class="sidebar-heading mb-3">
                Admin Student Menu
            </div>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="register_student_details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Register Student details</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_student_class.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Student details</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="creating_section.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Creating Section</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="student_attendance.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View Student Attendance</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="student_marks.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Student Marks</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="student_fee.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Student Fee status</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="student_login_id.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Student Login ID</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <div class="sidebar-heading mt-3 mb-3">
                Admin Teacher Menu
            </div>
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="register_teacher_details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Register Teacher details</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_teacher_details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Teacher details</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="creating_subject.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Creating Subject</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="teacher_login_id.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Teacher Login ID</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <?php
                } elseif (isset($_SESSION['teacherLoggedIn'])) {
                    echo 'Teacher';
                } elseif (isset($_SESSION['studentLoggedIn'])) {
                    echo 'Student';
                }
            }
            ?>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow center_col mr-3">
                            <?php if (isset($_SESSION['login'])) {
                                if (isset($_SESSION['adminLoggedIn'])) { ?>
                                    <form action="logout.php" method="post">
                                        <input type="hidden" name="logout" value="adminLogout" value="adminLogout">
                                        <input type="submit" class="btn btn-primary center" aria-current="page" value="Logout">
                                    </form>
                                <?php } elseif (isset($_SESSION['teacherLoggedIn'])) { ?>
                                    <form action="logout.php" method="post">
                                        <input type="hidden" name="logout" value="teacherLogout" value="teacherLogout">
                                        <input type="submit" class="btn btn-primary center" aria-current="page" value="Logout">
                                    </form>
                                <?php } elseif (isset($_SESSION['studentLoggedIn'])) { ?>
                                    <form action="logout.php" method="post">
                                        <input type="hidden" name="logout" value="studentLogout" value="studentLogout">
                                        <input type="submit" class="btn btn-primary center" aria-current="page" value="Logout">
                                    </form>
                            <?php }
                            }
                            ?>
                        </li>
                    </ul>
                </nav>