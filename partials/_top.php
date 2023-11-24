<?php
require('partials/connection.inc.php');
require('partials/function.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent's Teacher's Association</title>
    <link rel="stylesheet" href="css/stylebs.css">
    <link rel="stylesheet" href="/pta/css/custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/b-2.4.2/datatables.min.css" rel="stylesheet">
    <style>
        body,
        h1,
        h2,
        p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;            
            background: linear-gradient(45deg, #f7f7f7 50%, #ddd 50%);
            color: #333;
            background-repeat: no-repeat;
        }

        .full-screen {
            height: 100vh;
        }

        header {
            background-color: #ddd;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #7098da;
        }

        h1 {
            font-size: 36px;
        }

        nav ul {
            list-style: circle;
        }

        nav li {
            display: inline;
            margin-right: 10px;
        }

        nav a {
            text-decoration: none;
            color: #7098da;
            font-weight: bold;
            transition: color 0.3s;
            font-family: Georgia, serif;
            padding: 5px;
        }

        nav a:hover {
            color: #ff6600;
        }
    </style>
</head>

<body>
<header>
        <div class="header-container">
            <h1>Parent's Teacher's Association</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="event.html">Events</a></li>
                    <li><a href="index.php/#Aboutus">About Us</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>