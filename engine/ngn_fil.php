<?php

function getAllPayouts($from, $till) {
    return queryAll("SELECT * FROM tbl_cash_payments WHERE date >= '{$from}' AND date <= '{$till}'");
}

function getAllInvoices($from, $till) {
  return queryAll("SELECT * FROM tbl_purchase_invoices WHERE date >= '{$from}' AND date <= '{$till}'");
}

function getAllExpenses($from, $till) {
  return queryAll("SELECT * FROM tbl_expenses WHERE date >= '{$from}' AND date <= '{$till}'");
}