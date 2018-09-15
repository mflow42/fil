<?php

$from = $_SESSION['from'];
$till = $_SESSION['till'];

$invoices = getAllInvoices($from, $till);
$payouts = getAllPayouts($from, $till);
$expenses = getAllExpenses($from, $till);
$links = getAllLinks();
echo render('tpl_links', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses, 'links' => $links]);