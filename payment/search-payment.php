<?php

include_once '../controllers/payment-controller.php';

$data = $_POST['value'];

$paymentController = new PaymentController();
$payments = $paymentController->searchPayment($data);
$count = 1;
$output = "";
foreach($payments as $payment){
    $output .= "
    <tr id=" . $payment['payment_id'] . ">
                                
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" .$payment['user_name'] . "</td>
                                <td class='align-middle'>" . $payment['plan_name'] . "</td>
                                <td class='align-middle'>" . $payment['paid_date'] . "</td>
                                <td class='align-middle'>" . $payment['plan_duration'] . "</td>
                                <td class='align-middle'>" . $payment['expired_date'] . "</td>
                               <td>
                                <a class='btn btn-info' href='invoice.php?id=" . $payment['payment_id'] . "'><i class='fa-solid fa-circle-info'></i> view invoice</a>
                                <button class='btn btn-dark' onclick='sendEmail?id". $payment['payment_id'] ."'><i class='fa-solid fa-paper-plane'></i> Send</button>
                               </td>
                            </tr>
    ";
    
}
echo $output;
?>