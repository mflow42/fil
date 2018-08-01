<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2018
 * Time: 23:15
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    var_dump($_GET);
    $from = $_POST['from'];
    $till = $_POST['till'];
    
    $invoices = getAllInvoices($from, $till);
    $payouts = getAllPayouts($from, $till);
    $expenses = getAllExpenses($from, $till);
    
//    console.log($payouts);
//    echo json_encode(['success'=>'ok', 'message'=>'Даты выбраны']);
    
//    echo render('tpl_invoices', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses]);
//    echo render('tpl_invoices', ['payouts' => $payouts]);
//    return $invoices;
}
