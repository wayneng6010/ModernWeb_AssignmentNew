<?php
session_start();
require_once '../php/conn.php';

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require 'app/start.php';
if (isset($_GET['success'])) {
    if ($_GET['success'] == 'false') {
        header("Location: http://localhost/modern_web_project/public_html/cart.php");
        die();
    }
}

if (!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
    die();
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
try {
    $result = $payment->execute($execute, $paypal);
} catch (Exception $e) {
    $data = json_decode($e->getData());
    echo $data->message;
    die($e);
}
echo "Payment successful." . "<br>";
if (isset($_SESSION['checkout_ttl'])) {
    $sql_update_chromatic = "UPDATE chromatic_cat SET `Solo_Status`='paid',`Solo_PaymentDate`=now() WHERE `Solo_UserID` = $_SESSION[uID] AND `Solo_Status`='pending'";
    $sql_update_ensemble = "UPDATE ensemble_cat SET `Ensemble_Status`='paid',`Ensemble_PaymentDate`=now() WHERE `Ensemble_UserID` = $_SESSION[uID] AND `Ensemble_Status`='pending'";
    $sql_update_orchestra = "UPDATE orchestra_cat SET `Orchestra_Status`='paid',`Orchestra_PaymentDate`=now() WHERE `Orchestra_UserID` = $_SESSION[uID] AND `Orchestra_Status`='pending'";
    $sql_update_seminar = "UPDATE seminar SET `Sem_Status`='paid',`Sem_PaymentDate`=now() WHERE `Sem_UserID` = $_SESSION[uID] AND `Sem_Status`='pending'";
    $query_result_chromatic = mysqli_query($link, $sql_update_chromatic);
    $query_result_ensemble = mysqli_query($link, $sql_update_ensemble);
    $query_result_orchestra = mysqli_query($link, $sql_update_orchestra);
    $query_result_seminar = mysqli_query($link, $sql_update_seminar);
            
    if ($query_result_chromatic && $query_result_ensemble && $query_result_orchestra && $query_result_seminar) {
        echo "Registration has been submitted successfully." . "<br>";
    } else {
        echo "<script>alert('Error occured while submitting registration')</script>";
    }
    unset($_SESSION['checkout_ttl']);
}

echo "Redirecting.." . "<br>";
header('Refresh: 2; URL=http://localhost/ModernWeb_Assignment-master/public_html/cart.php');

?>
