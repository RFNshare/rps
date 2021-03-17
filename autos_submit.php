<?php
session_start();
require_once "pdo.php";
if (isset($_POST['logout']) && $_POST['logout'] == 'Logout') {

// remove all session variables
    session_unset();

// destroy the session
    session_destroy();

    header('Location: index.php');
}
elseif (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {
    try {
        if (strlen($_POST['make']) < 1) {
            header("Location: autos.php?fail_message=" . "Make is required");
        } else {
            if (is_numeric($_POST['year']) && is_numeric($_POST['mileage'])) {
                $sql = "INSERT INTO autos(make, year, mileage) values (:make, :year, :mileage)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':make' => $_POST['make'],
                    ':year' => $_POST['year'],
                    ':mileage' => $_POST['mileage']
                ));
                header("Location: autos.php?message=" . "Record inserted");
            } else {
                header("Location: autos.php?fail_message=" . "Mileage and year must be numeric");
            }
        }
    } catch (Exception $ex) {
        $check = $ex->getMessage();
        echo("Contact Support");
        error_log("SQL Fail " . "$check");
        return;
    }
} else {
    echo "Failed";
}