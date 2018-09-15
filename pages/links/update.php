<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.08.2018
 * Time: 23:15
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // запишем первый элемент массива $_POST в переменную payout прежде чем этот элемент удалим из $_POST
    $payout = array_keys($_POST)[0];
    
    //удалим из $_POST первый элемент так как это payout, чтобы при итерировании он не мешался
    array_shift($_POST);
    
    // пройдем по оставшимя элементам в $_POST
    foreach ($_POST as $key => $value) {
        $cash_payment_id = explode('_', $payout)[1];
        $cash_payment_amount = explode('_', $payout)[2];
        
        $data = explode('_', $key);
        $doc = $data[0];
        $id = $data[1];
        $amount = $data[2];
        if ($doc === 'invoice') {
            $invoice_id = $id;
            $invoice_amount = $amount;
        } elseif ($doc === 'expense') {
            $expense_id = $id;
            $expense_amount = $amount;
        } else {
            var_dump('Unknown $_POST values');
        }
        
        //назначим NULL для пустых значений
        if ($invoice_id === '') {
            $invoice_id = 'NULL';
        };
        
        if ($invoice_amount === '') {
            $invoice_amount = 'NULL';
        };
        
        if ($expense_id === '') {
            $expense_id = 'NULL';
        };
        
        if ($expense_amount === '') {
            $expense_amount = 'NULL';
        };
    insertChanges($cash_payment_id, $cash_payment_amount, $invoice_id, $invoice_amount, $expense_id, $expense_amount);
    }
    redirect($_SERVER['HTTP_REFERER']);
}