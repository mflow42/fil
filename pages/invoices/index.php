<?php
$date = date('Y-m-d');

$invoices = getAllInvoices($date, $date);
$payouts = getAllPayouts($date, $date);
$expenses = getAllExpenses($date, $date);

echo render('tpl_invoices', ['invoices' => $invoices, 'payouts' => $payouts, 'expenses' => $expenses]);
