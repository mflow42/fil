<?php

function getAllPayouts($from, $till) {
    return queryAll("SELECT
    p.id,
    p.amount,
    p.date,
    p.description,
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

function getAllPayoutsGrouped($from, $till) {
    return queryAll("SELECT
    p.id,
    p.amount,
    p.date,
    p.description,
    SUM(l.invoice_amount) as invoice_amount,
    SUM(l.expense_amount) as expense_amount,
    p.amount - COALESCE(SUM(l.invoice_amount), 0) - COALESCE(SUM(l.expense_amount), 0) as difference
    FROM tbl_cash_payments as p
    LEFT JOIN
      tbl_links as l ON l.cash_payment_id = p.id
    WHERE date >= '{$from}' AND date <= '{$till}'
    GROUP BY p.id
    ORDER BY id ASC"
    );
}

function getAllInvoices($from, $till) {
    return queryAll("SELECT
    i.id,
    i.date,
    i.subtotal,
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
    return queryAll("SELECT
    e.id,
    e.date,
    e.total,
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