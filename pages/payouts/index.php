<?php

$from = $_SESSION['from'];
$till = $_SESSION['till'];

$invoices = getAllInvoices($from, $till);
$payouts = getAllPayoutsGrouped($from, $till);
$expenses = getAllExpenses($from, $till);
$links = getAllLinks();

echo render('tpl_payouts', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses, 'links' => $links]);