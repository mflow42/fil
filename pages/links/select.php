<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2018
 * Time: 23:15
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] === 'date') {
//    var_dump($_GET);
    
    $from = substr($_GET['daterange'], 0, 10);
    $till = substr($_GET['daterange'], -10);
    
    $_SESSION['from'] = $from;
    $_SESSION['till'] = $till;
    
    $invoices = getAllInvoices($from, $till);
    $payouts = getAllPayouts($from, $till);
    $expenses = getAllExpenses($from, $till);
    $links = getAllLinks();
//    var_dump($links);
    
    echo render('tpl_links', [
        'from' => $from,
        'till' => $till,
        'invoices' => $invoices,
        'payouts' => $payouts,
        'expenses' => $expenses,
        'links' => $links
    ]);
  }