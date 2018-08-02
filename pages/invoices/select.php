<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2018
 * Time: 23:15
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $from = substr($_GET['daterange'], 0, 10);
    $till = substr($_GET['daterange'], -10);
    
    $_SESSION['from'] = $from;
    $_SESSION['till'] = $till;
    
    $invoices = getAllInvoices($from, $till);
    $payouts = getAllPayouts($from, $till);
    $expenses = getAllExpenses($from, $till);
    
    echo render('tpl_invoices', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses]);
  }