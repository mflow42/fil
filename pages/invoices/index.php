<?php

$from = $_SESSION['from'];
$till = $_SESSION['till'];

$invoices = getAllInvoices($from, $till);
$payouts = getAllPayouts($from, $till);
$expenses = getAllExpenses($from, $till);

echo render('tpl_invoices', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses]);