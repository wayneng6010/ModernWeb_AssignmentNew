<?php

session_start();
require_once '../php/conn.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\Details;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Exception\PayPalConnectionException;

require 'app/start.php';

//echo "<script>alert(" . $_SESSION['checkout_ttl'] . ")</script>";

if (!isset($_SESSION['uID'])) {
    die();
}

if (isset($_SESSION['uID'])) {
    if (isset($_SESSION['uID'])) {
        $uid1 = $_SESSION['uID'];
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $items = "Registration Fee for " . ($_SESSION['checkout_ttl'] / 20) . " person.";
        $total = $_SESSION['checkout_ttl'];
        $price = $_SESSION['checkout_ttl'];
        $itemList = new ItemList();
        $itemList->setItems($items);
        // print_r($itemList);
        $details = new Details();
        $details->setSubtotal($price);
        // print_r($details);
        $amount = new Amount();
        $amount->setCurrency('MYR')
                ->setTotal($total)
                ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setDescription('Pay for Malaysia Harmonica Festival 2019')
                ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://localhost/ModernWeb_Assignment-master/public_html/vendor/pay.php?success=true')
                ->setCancelUrl('http://localhost/ModernWeb_Assignment-master/public_html/vendor/pay.php?success=false');
        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);
        try {
            $payment->create($paypal);
        } catch (Exception $e) {
            die($e);
        }
// try {
// 					$payment->create($paypal);
// } catch (PayPal\Exception\PayPalConnectionException $ex) {
//     echo $ex->getCode(); // Prints the Error Code
//     echo $ex->getData()."<br><br>"; // Prints the detailed error message 
//     die($ex);
// } catch (Exception $ex) {
//     die($ex);
// }
        $approvalUrl = $payment->getApprovalLink();
        header("Location: {$approvalUrl}");
    }
}
?>