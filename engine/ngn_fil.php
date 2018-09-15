<?php

function getAllPayouts($from, $till) {
    return queryAll("SELECT
    p.*,
    l.id as link_id,
    l.invoice_id,
    l.invoice_amount,
    l.expense_id,
    l.expense_amount
    FROM tbl_cash_payments as p
    LEFT JOIN
      tbl_links as l ON l.cash_payment_id = p.id
    WHERE date >= '{$from}' AND date <= '{$till}'
    ORDER BY id ASC"
    );
}

function getAllInvoices($from, $till) {
    return queryAll("SELECT
    i.*,
    l.id as link_id,
    l.cash_payment_id,
    l.cash_payment_amount,
    l.invoice_id,
    l.invoice_amount,
    l.expense_id,
    l.expense_amount
    FROM tbl_purchase_invoices as i
    LEFT JOIN
      tbl_links as l ON l.invoice_id = i.id
    WHERE date >= '{$from}' AND date <= '{$till}'
    ORDER BY id ASC"
    );
}

function getAllExpenses($from, $till) {
    return queryAll("SELECT e.*,
    l.id as link_id,
    l.cash_payment_id,
    l.cash_payment_amount,
    l.invoice_id,
    l.invoice_amount,
    l.expense_id,
    l.expense_amount
    FROM tbl_expenses as e
    LEFT JOIN
      tbl_links as l ON l.expense_id = e.id
    WHERE date >= '{$from}' AND date <= '{$till}'
    ORDER BY id ASC"
    );
}

function getAllLinks() {
    return queryAll("SELECT * FROM tbl_links");
}

function insertChanges($cash_payment_id, $cash_payment_amount, $invoice_id, $invoice_amount, $expense_id,
                       $expense_amount) {
    
    $invoice_id = !empty($invoice_id) ? "'$invoice_id'" : "NULL";
    $invoice_amount = !empty($invoice_amount) ? "'$invoice_amount'" : "NULL";
    $expense_id = !empty($expense_id) ? "'$expense_id'" : "NULL";
    $expense_amount = !empty($expense_amount) ? "'$expense_amount'" : "NULL";
    
    return execute("INSERT INTO `db_standar`.`tbl_links` (`cash_payment_id`, `cash_payment_amount`, `invoice_id`, `invoice_amount`, `expense_id`, `expense_amount`) VALUES ('$cash_payment_id', '$cash_payment_amount', $invoice_id, $invoice_amount, $expense_id, $expense_amount)"
    );
}