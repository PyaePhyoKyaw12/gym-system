<?php

session_start();
if(isset($_POST['logout']))
{
    unset($_SESSION['username']);
    session_destroy();
    header('location:../login.php');
}

include_once "../layouts/header.php";

?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        
        <?php include_once "../layouts/main.php" ?>

        <?php include_once "../layouts/footer.php" ?>
